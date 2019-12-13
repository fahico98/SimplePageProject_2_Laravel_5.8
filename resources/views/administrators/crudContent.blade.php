
<div class="row justify-content-center">
   <div class="col-md-8">
      <div class="card">
         <div class="card-header">{{ __('User Search') }}</div>
         <div class="card-body">
            <div class="form-group mb-3">
               <label for="tableSearchSelector">User Role</label>
               <select class="form-control" id="roleSelector">
                  @if($role === "seller")
                     <option value="costumer">Costumers</option>
                     <option value="seller" selected>Sellers</option>
                  @else
                     <option value="costumer" selected>Costumers</option>
                     <option value="seller">Sellers</option>
                  @endif
               </select>
            </div>
            <div class="form-group">
               <label for="searchName">Name</label>
            <input type="text" class="form-control" id="searchName" value="{{$searchName}}">
            </div>
            <div class="pt-4">
               <table class="table">
                  <thead class="thead-light">
                     <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col" class="text-center">Phone number</th>
                        <th scope="col" class="text-center">E-mail</th>
                        <th scope="col" class="text-center">Actions</th>
                     </tr>
                  </thead>
                  <tbody id="crudBody">
                     @foreach($users as $user)
                        <tr>
                           <th scope="row">{{$user->name}}</th>
                           <td>{{$user->lastname}}</td>
                           <td class="text-center">{{$user->phone_number}}</td>
                           <td class="text-center">{{$user->e_mail}}</td>
                           <td class="text-center">
                              <a href="{{ route("destroy", ["id" =>  $user->id ]) }}">
                                 <i class="fas fa-trash-alt delete-icon mr-1" title="Delete user"></i>
                              </a>
                              <a href="{{ route("update", ["id" =>  $user->id ]) }}">
                                 <i class="fas fa-edit edit-icon" title="Update user"></i>
                              </a>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="pt-4">
               <nav aria-label="...">
                  <ul id="ulPagination" class="pagination pagination-sm justify-content-center">
                     @if($currentPage == 1)
                        <li class="page-item disabled">
                           <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                     @else
                        <li class="page-item"><a class="page-link prev-page" href="#">Previous</a></li>
                     @endif
                     @for($i = 1; $i <= $totalPages; $i++)
                        @if($i == $currentPage)
                           <li class="page-item active" aria-current="page">
                              <span class="page-link selected-page" id="{{$i}}">
                                 {{$i}}<span class="sr-only">(current)</span>
                              </span>
                           </li>
                        @else
                           <li class="page-item">
                              <a class="page-link page-change-link" href="#" id="{{$i}}">{{$i}}</a>
                           </li>
                        @endif
                     @endfor
                     @if($currentPage == $totalPages)
                        <li class="page-item disabled">
                           <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                        </li>
                     @else
                        <li class="page-item"><a class="page-link next-page" href="#">Next</a></li>
                     @endif
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
