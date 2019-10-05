
window.onload = function(){
   selector = this.document.querySelector("#tableSearchSelector");
   searchInput = this.document.querySelector("#searchInput");
   searchInput.addEventListener("keyup", function(){
      var data = new FormData();
      data.append("tableName", selector.value);
      fetch('/app/userSearch.php', {
         method: 'POST',
         body: data
      })
      .then(function(response){
         if(response.ok){
            console.log(">>>");
         }
      });
   });
}
