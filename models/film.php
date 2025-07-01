<?php
require_once __DIR__.'/model.php';
class Film extends Model {
    protected static string $table = 'films';
    protected static string $primary_key = 'id';

  private $id;
  private $title;
  private $description;
  private $trailer_url;
  private $release_date;
  private $duration_min;
  private $genre;
  private $rating;
  private $cast;
  private $image_url;

    /**
     * Film constructor.
     * @param array $data
     */

   
  public function __construct(array $data ) {
         $this->id = $data['id'];
         $this->title = $data['title'];
         $this->description = $data['description'];
         $this->release_date = $data['release_date'];
         $this->duration_min = $data['duration_min'];
         $this->trailer_url = $data['trailer_url'];
         $this->genre = $data['genre'];
         $this->rating = $data['rating'];
         $this->cast = $data['cast'];
         $this->image_url = $data['image_url'];

    }

     public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTrailerUrl() {
        return $this->trailer_url;
    }

    public function getReleaseDate() {
        return $this->release_date;
    }

    public function getDurationMinutes() {
        return $this->duration_min;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getCast() {
        return $this->cast;
    }
    public function getImageUrl() {
        return $this->image_url;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function setTrailerUrl($trailer_url) {
        $this->trailer_url = $trailer_url;
    }
    public function setReleaseDate($release_date) {
        $this->release_date = $release_date;
    }
    public function setDurationMinutes($duration_min) {
        $this->duration_min = $duration_min;
    }
    public function setGenre($genre) {
        $this->genre = $genre;
    }
    public function setRating($rating) {
        $this->rating = $rating;
    }
    public function setCast($cast) {
        $this->cast = $cast;
    }
    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'trailer_url' => $this->trailer_url,
            'release_date' => $this->release_date,
            'duration_min' => $this->duration_min,
            'genre' => $this->genre,
            'rating' => $this->rating,
            'cast' => $this->cast,
            'image_url' => $this->image_url,
            ];
           
    }












}
