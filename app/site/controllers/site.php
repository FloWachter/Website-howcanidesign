<?php
// SEARCH 
return function($site, $pages, $page) {

	$query   	= get('q');
	$posts 		= $site->index()->filterBy('intendedTemplate', 'article');
	//only for visible post
	//$results 	= $posts->visible()->search($query, 'title|tags|date|text');
	$results 	= $posts->search($query, 'title|tags|date|text');
	$results = $results->paginate(200);

  return array(
    'query'      => $query,
    'results'    => $results,
    'pagination' => $results->pagination()
  );


};



