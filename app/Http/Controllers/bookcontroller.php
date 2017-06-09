<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirements;
use App\Ranks;
use Redirect;

class BookController extends Controller
{
    public function index()
    {        
    	$requirements = Requirements::all();
        return View('zakappje.books')
        	->with('requirements', $requirements);
    }

    public static function GetInfo()
    {
    	$results = Ranks
    				::leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
				    ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
				    ->select('ranks.*', 'mainrequirements.*', 'requirements.*')
				    ->orderby('rank_id')
				    ->get();



	$array = array();
	$first = 0;
	$second = 0;
	$currentRank = 0;
	$currentMainRequirement = 0;
	$currentRequirement = 0;
	$i=0;


		foreach ($results as $result) {
		echo $i++;
			if ($currentRank !== $result->rank_id)
			{
				$currentRank = $result->rank_id;
				$array[$first] = array($result->rank_name);
				$second = 0;
				$first++;

				if (isset($result->mainrequirements_id)){
					if ($currentMainRequirement !== $result->mainrequirements_id)
					{
						$currentMainRequirement = $result->mainrequirement_id;
						$array[$first][$second] = array($result->mainrequirements_name);
						$third = 0;
						$second++;

							if (isset($result->requirements_id)){
								$array[$first][$second][$third] = array($result->requirements_name, $result->rquirements_id);
								$third++;
							}
					}
					else
					{
						if (isset($result->requirements_id)){
							$array[$first][$second][$third] = array($result->requirements_name, $result->rquirements_id);
						}
					}
				}
			}
			else
			{
				if (isset($result->mainrequirements_id)){
					if ($currentMainRequirement !== $result->mainrequirements_id)
					{
						$currentMainRequirement = $result->mainrequirement_id;
						$array[$first][$second] = array($result->mainrequirements_name);
						$third = 0;
						$second++;

							if (isset($result->requirements_id)){
								$array[$first][$second][$third] = array($result->requirements_name, $result->rquirements_id);
								$third++;
							}
					}
					else
					{
						if (isset($result->requirements_id)){
							$array[$first][$second][$third] = array($result->requirements_name, $result->rquirements_id);
						}
					}
				}
			}
		}






			/*$array = array(
				array('klas 1', 
					array('mr 1.1', 
						array('r 1.1.1'),
						array('r 1.1.2')
					),
					array('mr 1.2')
				),
				array('klas 2',
					array('mr 2.1'),
					array('mr 2.2')
				),
				array('klas 3',
					array('mr 3.1'),
					array('mr 3.2')
				),
				);*/

    	return $array;
    }

    public function show(Request $request, Requirements $requirement)
    {
    	//$name = $request->get('name');
    	return View('zakappje.books')
    		->with('name', $requirement);
    }
   
}