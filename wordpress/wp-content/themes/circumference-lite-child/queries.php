<?php
$movies = WP_Query(array('post_type'=>'movies', 'orderby'=>'title', 'order'=>'ASC', 'paged'=>' $paged)

while($movies->have_posts()) : $query->the_post();
