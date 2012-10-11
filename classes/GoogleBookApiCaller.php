<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoogleBookApiCaller
 *
 * @author bibouh
 */
include_once 'Author.php';

class GoogleBookApiCaller {

    //URL of google book api
    var $key = "AIzaSyBaZwSa7tSjJnWmiCGYnEY087u-P-aGFGE";
    var $url = "https://www.googleapis.com/books/v1/volumes?maxResults=5&prettyPrint=false&printType=books&orderBy=relevance&q=";

    //put your code here
    function callAuthor($author, $lang = 'fr') {

        $author_ = urlencode($author);
        $url_ = $this->url . "inauthor:" . $author_; //. "&langRestrict=" . $lang;
        //DEBUG
        var_dump($url_);
        echo "<br/>";

//Curl Requete
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url_);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HEADER, false);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $resultat = curl_exec($c);

        $json_result = json_decode($resultat, true);

        return $this->generateBooksOfAuthor($json_result);
    }

    function generateBooksOfAuthor($json_object) {
        $list_of_books = array();
        if ($json_object != null) {
            foreach ($json_object['items'] as $book) {
                //DEBUG
                echo "<br/>****************<br/><br/>";
                //$list_of_books[] = Book::parseFromJson($book);
                var_dump(Book::parseFromJson($book));
            }
        } else {
            echo "<br/> Fuck requete";
        }

        return $list_of_books;
    }

}

?>
