<?php

/**
 * This is the model class for table "Dict".
 *
 * The followings are the available columns in table 'Dict':
 * @property integer $id
 * @property string $en
 * @property string $ru
 */
class Dict extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Dict';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('en, ru', 'required'),
            array('en, ru', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, en, ru', 'safe', 'on' => 'search'),
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
            'log' => [static::HAS_MANY, 'TestLog', 'dict_id'],
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'en' => 'En',
            'ru' => 'Ru',
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
        $criteria->compare('en', $this->en, true);
        $criteria->compare('ru', $this->ru, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Dict the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getNextQuestion($testId)
    {
        $criteria = new CDbCriteria();
        $criteria->with = [
            'log' => [
                'select' => false,
            ],
        ];
        $criteria->addCondition('log.id IS NULL');
        $criteria->params = [
            ':testId' => $testId,
        ];
        $criteria->order = 'RAND() ASC';
        $criteria->limit = 1;
        $criteria->together = true;
        return static::find($criteria);
    }

    public function getVariants()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('t.id != :dict_id');
        $criteria->params = [':dict_id' => $this->id];
        $criteria->order = 'RAND() ASC';
        $criteria->limit = 3;
        return static::findAll($criteria);
    }
}
