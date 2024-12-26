<?php

namespace app\controllers;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use app\models\UserForm;
use app\models\User_table;

class FormController extends Controller
{
   public $layout = 'form_layout';
   public $view_user;

    public function actionForm() {
        $form = new UserForm();

        // если данные загружены и прошли валидацию
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            // считываем поля формы, предварительно обезопасив полученные данные
            $name = Html::encode($form->name);
            $surname = Html::encode($form->surname);
            $phone = Html::encode($form->phone);
        }
        else {
            $name = '';
            $surname = '';
            $phone = '';
        }

        return $this->render('form',
            ['form' => $form,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone]);
    }

    public function actionShow() {
        $this->view->title = 'Список пользователей';

        $users = User_table::find()->all(); // создаем объект запроса к базе данных и получаем все записи из таблицы uder_table

        return $this->render('view_user',
        [
            'users' => $users
        ]);
    }

    public function actionCreate() {     // добавляем пользователя в базу данных
        $this->view->title = 'Добавление пользователя';

        $user = new User_table();

        if(\Yii::$app->request->isAjax){ // если данные приходят по AJAX
            $user->load(\Yii::$app->request->post()); // загружаем данные в модель из массива post
            \Yii::$app->response->format = Response::FORMAT_JSON; // возвращаем ответ в формате JSON
            return ActiveForm::validate($user); // возвращаем результат валидации
        }

        if($user->load(\Yii::$app->request->post())) {  // если данные загружены с помощью метода post()
                 
            $user->date_creation = date("Y-m-d");
            $user->date_update = date("Y-m-d");
                                                             
            $user->save();  // сохраняем все данные
            // метод save() вызывает метод validate() автоматически
                
            return $this->actionShow(); // переходим на страницу со списком всех пользователей
        }

        return $this->render('create_user', compact('user')); // передаем в вид объект user
    }

      public function actionUpdate($id= '') { // обновляем данные о пользователе по id
        $this->view->title = 'Редактирование пользователя';

        $user = User_table::findOne($id); // редактируемая запись в таблице

        if(!$user) { // проверка, существует ли такой пользователь
            throw new NotFoundHttpException('Данный пользователь НЕ НАЙДЕН -('); // ошибка 404
        }

        if($user->load(\Yii::$app->request->post())) {  // если данные загружены с помощью метода post()
            
            $user->date_update = date("Y-m-d");
                                                             
            $user->save();  // сохраняем все данные
            // метод save() вызывает метод validate() автоматически
                
            \Yii::$app->session->setFlash('success', 'ДАННЫЕ УСПЕШНО СОХРАНЕНЫ. ИЗМЕНЕНИЯ ОТОБРАЖЕНЫ В ФОРМЕ НА ЭТОЙ СТРАНИЦЕ.'); // сохраняем данные в сессию
            
            return $this->refresh(); // обновляем страницу
        }
        
        return $this->render('update_user', compact('user')); // передаем в вид объект user
    }

    public function actionDelete($id = '') {
        $this->view->title = 'Удаление пользователя';
        $user = User_table::findOne($id); // удаляемая из таблицы запись

        if($user) { // если пользователь существует
            if(false !== $user->delete()) { // если нет ошибки удаления
                \Yii::$app->session->setFlash('success', 'ПОЛЬЗОВАТЕЛЬ УДАЛЕН');
            } else {
                \Yii::$app->session->setFlash('error', 'ОШИБКА УДАЛЕНИЯ ДАННЫХ');
            }
        }

        return $this->render('delete_user', compact('user')); // передаем в вид объект user
    }

}