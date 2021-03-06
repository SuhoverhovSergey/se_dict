<?php

/**
 * This is the model class for table "Test".
 *
 * The followings are the available columns in table 'Test':
 * @property integer $id
 * @property string $user_id
 * @property integer $is_finished
 */
class Test extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Test';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('is_finished', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, is_finished', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'log' => [static::HAS_MANY, 'TestLog', 'test_id'],
            'user' => [static::BELONGS_TO, 'User', 'user_id'],
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'is_finished' => 'Is Finished',
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
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('is_finished', $this->is_finished);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Test the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public static function getTestByUserId($userId)
    {
        $test = static::model()->findByAttributes(['user_id' => $userId, 'is_finished' => false]);
        if (!$test) {
            $test = new Test();
            $test->user_id = $userId;
            $test->save();

            // сбрасываем оценку
            $user = User::model()->findByPk($userId);
            $user->score = 0;
            $user->save();
        }
        return $test;
    }
}
