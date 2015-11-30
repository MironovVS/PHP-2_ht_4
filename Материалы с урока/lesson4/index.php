<?php

// Родительский класс
class Article
{
	const TYPE = 'article';
	static protected $count = 0;

	/*public - обращение отовсюду
	private - обращение только внутри созданного (текущего) класса
	protected - обращение из текущего класса и из классов наследников*/

	// Поля
	protected $id;
	protected $title;
	protected $content;

	// Конструктор объекта
	public function __construct($id, $title, $content = null)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
	}

	// функция для вывода статей
	public function show()
	{
		echo "My Article, TYPE: ".self::TYPE.": <h1>{$this->title}</h1><p>{$this->content}</p>";
	}

	// Вызов метода внутри текущего класса и его потомков
	protected function getId()
	{
		return $this->id;
	}

	// Вызов статичного метода класса
	public static function getCount()
	{
		// Обращение к статичное переменной класса
		return self::$count;
	}
}

// Класс новости
class NewsArticle extends Article implements IComparable
{
	public $datetime;

	function __construct($id, $title, $content)
	{
		self::$count++;
		parent::__construct($id, $title, $content);
		$this->datetime = time();
	}

	// Переопределяем метод show родителя
	function show()
	{
		$format = 'd/m/Y';
		// обращение к методу родителя
		echo 'ID Новости: ' . $this->getId() . '<br>';
		echo "Новость, TYPE ".self::TYPE." : <h1>{$this->title}</h1><small>Дата: ".date($format, $this->datetime)."</small>".
		"<p>{$this->content}</p>";
	}

	public function compare($other)
	{

	}


}


interface IComparable
{
	public function compare(IComparable $other);
}


interface IArticle
{
	public function view();
	public function get_intro();
}


class CrossArticle implements IComparable, IArticle
{
	private $title;
	private $content;


	public function get_intro()
	{
		return mb_substr($content, 0, 100);
	}

	public function view()
	{
		return mb_substr($content, 0, 500);
	}

	public function compare(IComparable $other)
	{
		// какой то код сравнивает
		echo 'Статьи одинаковы';
	}
}


$crossArticle = new CrossArticle;
$newsArticle = new NewsArticle(1, 'Заголовок', 'Текст статьи');


$crossArticle->compare($newsArticle);






