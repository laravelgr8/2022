First you create a repository:
use App\Repositories\Interfaces\RepositoryInterface;
<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface {
 
    public function all($columns = array('*'));
 
    public function paginate($perPage = 15, $columns = array('*'));
 
    public function create(array $data);
 
    public function update(array $data, $id);
 
    public function delete($id);
 
    public function find($id, $columns = array('*'));
 
    public function findBy(array $attributes, $type, $columns = array('*'));

    public function findActive($columns = array('*'));

    public function updateBy(array $data, array $where);

    public function updateOrCreate(array $data, array $where);

    public function findOrCreate(array $where);

    public function deleteBy(array $where);

    public function truncate();

}



now you create repositories:-
App\Repositories\Contracts\Repository;

namespace App\Repositories;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Contracts\Repository;

class CategoryRepository extends Repository
{
    function model()
    {
        return 'App\Models\ClientCategory';
    }

    public function checkAccessTscCategoryQuery($categoryName,$type = 'title')
    {
        // dd($accessCategoryId);  
        $clientCategory         = TableHelper::MST_CLIENT_CATEGORY;
        $tscCategoryTable       = TableHelper::MST_TSC_CATEGORY;
        $dataQuery              = $this->makeModel();


        $dataQuery->select(
            $tscCategoryTable . '.title',
            $tscCategoryTable . '.id',
           
        );

        $dataQuery->from($tscCategoryTable);
        if($type == 'title'){
            $dataQuery->whereIn($tscCategoryTable.'.title', $categoryName);
        }
        else{
            $dataQuery->whereIn($tscCategoryTable.'.id', $categoryName);
        }
        
        $dataQuery->where($tscCategoryTable . '.is_active', 1);
        return $dataQuery;
   }
}



Now how to call repository on controller:-
use Facades\App\Repositories\Contracts\CountryRepository;
$geographicRiskQuery = CategoryRepository::countryListingwithRiskQueryofCategory($overallRisk);
