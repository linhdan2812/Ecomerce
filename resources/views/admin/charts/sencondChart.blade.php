
<div class='col-sm-6'>
    <h3>Danh sách sản phẩm sắp hết hàng!</h3>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <label for="">Từ:</label>
            <input class="date form-control" id="fromListProductOver" width="50%" value="" type="text">
          </div>
          <div class="col-sm-4">
            <label for="">Tới:</label>
            <input class="date form-control" id="toListProductOver" width="50%" value="" type="text">
          </div>
          <div class="col-sm-4">
            <button class="btn btn-success" id="searchListProductOver">Tìm kiếm</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12">
            <ul class="list-group" id="listProductOver">
            </ul>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
      $(function () {
        $('.date').datepicker({  
          format: 'dd-mm-yyyy'
        });
        let url = "{{route('listProductOver')}}"
        let text1 = '';
        let sort_by = 'asc';
          $.get(url,{
            sort_by: sort_by
            }).done(function( data ) {
              Arr1 = data['data'];
              for (let index = 0; index < Arr1.length; index++) {
              const element = Arr1[index];
              console.log(element);
              text1 += `<li class="list-group-item">${index + 1 } Sản phẩm: ${element.title} Số lượng: ${element.stock}</li>`;
            }
            document.getElementById('listProductOver').innerHTML = text1;
          });
        $('#searchListProductOver').click(function(){
          let url = "{{route('listProductOver')}}"
          let from = $('#fromListProductOver').val()
          let to = $('#toListProductOver').val();
          let text = '';
          let sort_by = 'asc';
          $.get(url,{
            to : to,
            from: from,
            sort_by: sort_by
            }).done(function( data ) {
              Arr = data['data'];
              if( data.length === 0 || data.length == 'undefined'){
                text += `<li class="list-group-item">Không có dự liệu nào phù hợp!!!</li>`;
              }
              else {
                for (let index = 0; index < Arr.length; index++) {
                const element = Arr[index];
                text += `<li class="list-group-item">${index + 1 } Sản phẩm: ${element.title} Số lượng: ${element.stock}</li>`;
              }
            }
            document.getElementById('listProductOver').innerHTML = text;
          });
        })
      });
  </script>

{{-- // var current_page = 1;
// var records_per_page = 3;
// function prevPage()
// {
//     if (current_page > 1) {
//         current_page--;
//         changePage(current_page);
//     }
// }

// function nextPage()
// {
//     if (current_page < numPages()) {
//         current_page++;
//         changePage(current_page);
//     }
// }
// function numPages()
// {
//     return Math.ceil(Arr1.length / records_per_page);
// }
// function changePage(page,Arr1)
// {
//     var btn_next = document.getElementById("btn_next");
//     var btn_prev = document.getElementById("btn_prev");
//     var listing_table = document.getElementById("listProductOver");
//     var page_span = document.getElementById("page");

//     // Validate page
//     if (page < 1) page = 1;
//     if (page > numPages()) page = numPages();

//     listing_table.innerHTML = "";

//     for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < Arr1.length; i++) {
//         listing_table.innerHTML += Arr1[i].title + "<br>";
//     }
//     page_span.innerHTML = page + "/" + numPages();

//     if (page == 1) {
//         btn_prev.style.visibility = "hidden";
//     } else {
//         btn_prev.style.visibility = "visible";
//     }

//     if (page == numPages()) {
//         btn_next.style.visibility = "hidden";
//     } else {
//         btn_next.style.visibility = "visible";
//     }
// }
// window.onload = function() {
//     changePage(1);
// }; --}}