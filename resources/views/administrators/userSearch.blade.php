
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">{{ __('User Search') }}</div>
               <div class="card-body">
                  <div class="form-group mb-3">
                     <label for="tableSearchSelector">User Role</label>
                     <select class="form-control" id="roleSelector">
                        <option value="costumer" selected>Costumers</option>
                        <option value="seller">Sellers</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="searchName">Name</label>
                     <input type="text" class="form-control" id="searchName">
                  </div>
                  <div class="pt-4">
                     <table class="table">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Last name</th>
                              <th scope="col">Phone number</th>
                              <th scope="col">E-mail</th>
                           </tr>
                        </thead>
                        <tbody id="crudBody"></tbody>
                     </table>
                  </div>
                  <div class="pt-4">
                     <nav aria-label="...">
                        <ul id="ulPagination" class="pagination pagination-sm justify-content-center"></ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="{{ asset('js/userSearch.js') }}" defer></script>
@endsection
