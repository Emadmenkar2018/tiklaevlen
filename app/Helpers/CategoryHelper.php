<?php

namespace App\Helpers;
use Vanilo\Category\Models\Taxonomy;
use Vanilo\Category\Models\Taxon;
use Vanilo\Category\Models\TaxonomyProxy;

/**
 * Class CategoryHierarchy
 * @package App\Helpers
 */
class CategoryHelper {
    public static function get(){
		$taxonomies = TaxonomyProxy::get();
		return $taxonomies;
    }

}
