<?php
require_once 'classes.php';
//---------1 задание---------------
//Написать код, который будет использовать классы из файла classes.php
//следующим образом: создаст три экземпляра класса NewsArticle и три
//экземпляра класса CrossArtide, после чего эти объекты будут добавлены
//в объект списка статей (экземпляр класса ArticleList) с помощью метода add().
echo "<h1>1 задание</h1>";
$a1 = new NewsArticle (1, 'NewsArticle 1', 'NewsArticleNewsArticleNewsArticleNewsArticleNewsArticleNewsArticle');
$a2 = new NewsArticle (2, 'NewsArticle 2', 'NewsArticleNewsArticleNewsArticleNewsArticleNewsArticleNewsArticle');
$a3 = new NewsArticle (3, 'NewsArticle 3', 'NewsArticleNewsArticleNewsArticleNewsArticleNewsArticleNewsArticle');
$a = new ArticleList();

$a->add($a1);
$a->add($a2);
$a->add($a3);
$a->view();

// -------2 задание-----------
//Создать потомка класса Article, который будет отвечать за статьи,
//у которых есть прикреплённое изображение. Создать несколько таких
//статей и добавить в существующий список (экземпляр класса ArticleList).
echo "<h1>2 задание</h1>";
$a4 = new imageArticle(4, 'Img 4', 'imageArticleimageArticle', 'img/1.png');
$a5 = new imageArticle(5, 'Img 5', 'imageArticleimageArticle', 'img/2.png');
$a6 = new imageArticle(6, 'Img 6', 'КimageArticleimageArticle', 'img/3.png');
$a = new ArticleList();
$a->add($a4);
$a->add($a5);
$a->add($a6);
$a->view();
// -----------4 задание-----------
//Создать потомок класса ArticleList,
//который будет выводить статьи в обратном порядке,
//а не в том, в котором статьи были добавлены.
echo "<h1>4 задание</h1>";
$Reverse = new Reverse();
$Reverse->add($a1);
$Reverse->add($a2);
$Reverse->add($a3);
$Reverse->add($a4);
$Reverse->add($a5);
$Reverse->add($a6);
$Reverse->view();