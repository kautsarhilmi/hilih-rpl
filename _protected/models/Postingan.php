<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Postingan extends ActiveRecord
	{
		private $pid;
		private $name;
		private $age;
		private $city;
		private $sex;
		private $words;

		public function rules() {
			return[
				[['name', 'age', 'city', 'sex', 'words'], 'required']
			];
		}
	}
?>