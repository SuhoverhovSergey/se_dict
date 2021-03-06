<?php

/**
 * This is the model class for table "TestLog".
 *
 * The followings are the available columns in table 'TestLog':
 * @property integer $id
 * @property string $test_id
 * @property string $dict_id
 * @property string $question_lang
 * @property integer $is_correct
 */
class TestLog extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'TestLog';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('test_id, dict_id, question_lang, is_correct', 'required'),
            array('is_correct', 'numerical', 'integerOnly' => true),
            array('test_id, dict_id', 'length', 'max' => 11),
            array('question_lang', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, test_id, dict_id, question_lang, is_correct', 'safe', 'on' => 'search'),
        );
    }

    public function afterSave()
    {
        if ($this->is_correct) {
            $user = $this->test->user;
            $user->score += 1;
            $user->save(false);
        }

        $count = static::model()->count("test_id = :test_id AND is_correct = 0", ['test_id' => $this->test_id]);
        if ($count >= 3) {
            $test = $this->test;
            $test->is_finished = true;
            $test->save(false);
        } else {
            $question = Dict::model()->getNextQuestion($this->test->id);
            if (!$question) {
                $test = $this->test;
                $test->is_finished = true;
                $test->save(false);
            }
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'dict' => [static::BELONGS_TO, 'Dict', 'dict_id'],
            'test' => [static::BELONGS_TO, 'Test', 'test_id'],
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'test_id' => 'Test',
            'dict_id' => 'Dict',
            'question_lang' => 'Question Lang',
            'is_correct' => 'Is Correct',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('test_id', $this->test_id, true);
        $criteria->compare('dict_id', $this->dict_id, true);
        $criteria->compare('question_lang', $this->question_lang, true);
        $criteria->compare('is_correct', $this->is_correct);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TestLog the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
