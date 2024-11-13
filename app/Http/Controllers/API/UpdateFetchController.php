<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\BusinessMenu;
use App\Models\MenuPdf;
use App\Models\Business;
use App\Models\BusinessService;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Session;

class UpdateFetchController extends Controller
{

    use ApiResponseTrait;


}