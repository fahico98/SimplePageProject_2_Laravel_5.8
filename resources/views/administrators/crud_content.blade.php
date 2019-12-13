
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
      <tbody>
         @forelse($users as $user)
            <tr>
               <th scope="row">{{$user->name}}</th>
               <td>{{$user->lastname}}</td>
               <td class="text-center">{{$user->phone_number}}</td>
               <td class="text-center">{{$user->e_mail}}</td>
               <td class="text-center">
                  <a href="{{ route("users.destroy", ["id" =>  $user->id ]) }}">
                     <i class="fas fa-trash-alt delete-icon mr-1" title="Delete user"></i>
                  </a>
                  <a href="{{ route("users.edit", ["id" =>  $user->id ]) }}">
                     <i class="fas fa-edit edit-icon" title="Update user"></i>
                  </a>
               </td>
            </tr>
         @empty
            <tr><td colspan="2"><h5 class="mt-2"><strong>No results...!</trong></h5></td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="pt-4">
   <nav aria-label="...">
      <ul class="pagination pagination-sm justify-content-center">
         @if(count($users) > 0)
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
         @endif
      </ul>
   </nav>
</div>
