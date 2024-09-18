<form id="search-form" action="{{ route('restaurant.list') }}" method="GET">
            <div class="row no-gutters bg-white">
                <div class="col-lg-2 col-sm-4 col-6">

                    <select name="state" id="province">
                        <option value="">Province</option>
                        @foreach($provinces as $data)
                        <option value="{{$data->id}}">{{$data->province_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <select id="district" name="district">
                        <option value="" selected="selected">District</option>

                    </select>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <select id="municipality" name="municipality">
                        <option value="" selected="selected">Municipality</option>

                    </select>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <select id="category" class="menu_option" name="category" disabled="disabled">
                        <option value="" selected="selected">Category</option>
                    </select>
                </div>
                <div class="col-lg-4 border-0">
                    <div class="search_btn">
                        <input type="hidden" id="category_id" name="category_id">
                        <input type="hidden" id="municipality_id" name="municipality_id">
                        <button type="submit" id="search-button">Search</button>
                    </div>
                </div>
            </div>
        </form>