<?php
namespace app\models;
use yii\db\ActiveRecord;

class User_table extends ActiveRecord
{
    //правила валидации формы
    public function rules() {
        return [
            [['name', 'surname', 'phone'], 'required', 'message' => 'Поле не заполнено!'],
            [['name'], 'match', 'pattern' => '/^[a-zA-Zа-яА-ЯёЁ]{1,25}$/u', 'message' => 'Имя может состоять только из букв. Максимальная длина - 25 символов. Пробелов быть не должно.'],
            [['surname'], 'match', 'pattern' => '/^[a-zA-Zа-яА-ЯёЁ]{1,25}$/u', 'message' => 'Фамилия может состоять только из букв. Максимальная длина - 25 символов. Пробелов быть не должно.'],
            [['phone'], 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Номер телефона должен состоять только из цифр и иметь длину 10 символов.'],
            [['phone'] , 'unique', 'message' => 'Этот телефон уже занят!']
        ];
    }

}