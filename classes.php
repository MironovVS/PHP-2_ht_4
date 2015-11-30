<?php

class Article
{
	public $id;
	public $title;
	public $content;

//Для всех типов статей добавить новый атрибут:
//$preview. В нём будет храниться короткое описание
//статьи, полученное из первых 15 символов содержимого статьи.
//Сделать так, чтобы при создании экземпляров статей этот атрибут
//заполнялся данными автоматически.
	protected $preview;

public function __construct($id, $title, $content)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->preview=mb_substr($content, 0, 15);
	}

	//  Функция для вывода статьи
public function view()
	{
		echo "<h3>$this->title</a></h3><p>$this->preview</p>";
	}
}

class NewsArticle extends Article
{
	public $datetime;

public function __construct($id, $title, $content)
	{
		parent::__construct($id, $title, $content);
		$this->datetime = time();
			}
	
	//  Функция для вывода статьи
public function view()
	{
		echo "<h3>$this->title</h3><span style='color: red'>".
				strftime('%d.%m.%y', $this->datetime).
				" <b>Новость</b></span><p>$this->preview</p>";
	}
}

class CrossArticle extends Article
{
	public $source;

public function __construct($id, $title, $content, $source)
	{
		parent::__construct($id, $title, $content);
		$this->source = $source;
	}

public function view()
	{
		parent::view();
		echo '<small>'.$this->source.'</small>';
	}
}

class imageArticle extends Article
{
	public $image;

public function __construct($id, $title, $content, $image)
	{
		parent::__construct($id, $title, $content);
		$this->image = $image;
	}

public function view()
	{
		parent::view();
		echo '<small>'.$this->image.'</small>';
	}
}

class ArticleList
{
	protected $alist;

public function add(Article $article)
	{
		$this->alist[] = $article;
	}

	//В класс ArticleList добавить метод,
	// который будет удалять из списка
	// статью по её идентификатору (атрибут $id)
	public function delete($id){
		foreach($this -> alist as $key => $article){
			if($article == $id){
				unset($this -> alist[$key]);
			}
		}
	}

	//  Вывод статей
public function view()
	{
		foreach($this->alist as $article)
		{
			$article->view();
			echo '<hr />';
		}
	}
}


//Создать потомок класса ArticleList,
//который будет выводить статьи в обратном порядке,
//а не в том, в котором статьи были добавлены.
class Reverse extends ArticleList
{
	public function view()
	{
		krsort($this->alist);
		foreach ($this->alist as $article) {
			$article->view();
			echo "<hr>";
		}
	}
}

?>