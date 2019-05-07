<?php

class SitesResultsProvider{

    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    //count number of results
    public function getNumResults($term){
        $query = $this->con->prepare(
            "SELECT COUNT(*) as total FROM sites
            WHERE title LIKE :term
            OR url LIKE :term
            OR keywords LIKE :term
            OR description LIKE :term"
        );

        $searchTerm = "%" . $term . "%";
        $query->bindParam(":term", $searchTerm);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["total"];
    }

    public function getResultsHtml($page, $pageSize, $term) {

        $query = $this->con->prepare(
            "SELECT * FROM sites
            WHERE title LIKE :term
            OR url LIKE :term
            OR keywords LIKE :term
            OR description LIKE :term
            ORDER BY clicks DESC"
        );

        $searchTerm = "%" . $term . "%";
        $query->bindParam(":term", $searchTerm);
        $query->execute();

        $resultsHtml = "<div class='site-results'>";

        white($row = $query->fetch(PDO::FETCH_ASSOC)){

            $title = $row["title"];
            $resultsHtml .= "$title";
        }

        $resultsHtml .= "</div>;
        return $resultsHtml;
    }

}
?>