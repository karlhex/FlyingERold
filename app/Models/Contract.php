<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FilterModel;
use App\Models\Company;
use App\Traits\FilesMorphs;

class Contract extends FilterModel
{
    use HasFactory;
    use SoftDeletes;
    use FilesMorphs;

    /**
     *  Mass Assignment.
     */
    protected $guarded = ['id'];

    /**
     *  指定使用哪张表.
     */
    protected $table = 'contracts';

    /**
     * 金融交易表
     */
    public function sops()
    {
        return $this->hasMany(sop::class,'contract_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'contract_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contact_person()
    {
        return $this->belongTo(Person::class,'contact_person');
    }

    public function getCompanyNameAttribute()
    {
        $rec = $this->company;

        return $rec->name;
    }

    public function getTypeNameAttribute()
    {
        $rec = SelectOption::where('key','contracttype')
                           ->where('option',$this->type)
                           ->first();

        if ($rec == null)
            return null;

        return $rec->value;
    }

    public function getStageNameAttribute()
    {
        $rec = SelectOption::where('key','contractstage')
                           ->where('option',$this->stage)
                           ->first();

        if ($rec == null)
            return null;

        return $rec->value;
    }

    public function scopeFilter($query, $params)
    {
        $newparams = [];
        $has_company = false;
        $has_stage  = false;
        $has_type = false;
        $stage_array = [];
        $type_array = [];
        $company_array = [];

        foreach ($params as $key => $param)
        {
            switch($key)
            {
                case 'company_name':
                    if (trim($param) == '')
                        break;
                    $has_company = true;
                    $items = Company::filter(['name' => $param])->get('id');
                    foreach ($items as $item)
                        array_push($company_array,$item->id);
                    break;
                case 'stage_name':
                    if (trim($param) == '')
                        break;
                    $has_stage = true;
                    $items =  SelectOption::where('key','contractstage')
                                    ->where('value' ,'LIKE','%'.trim($param).'%')
                                    ->get('option');
                    foreach ($items as $item)
                        array_push($stage_array,$item->option);

                    break;
                case 'type_name':
                    if (trim($param) == '')
                        break;
                    $has_type = true;
                    $items =  SelectOption::where('key','contracttype')
                                    ->where('value' ,'LIKE','%'.trim($param).'%')
                                    ->get('option');
                    foreach ($items as $item)
                        array_push($type_array,$item->option);

                    break;
                default:
                    $newparams[$key] = $param;

            }
        }

        $q = parent::scopeFilter($query,$newparams);

        if ($has_stage)
            $q = $q->whereIn('stage',$stage_array);

        if ($has_type)
            $q = $q->whereIn('type',$type_array);

        if ($has_company)
            $q = $q->whereIn('company_id',$company_array);

        return $q;
    }
}
