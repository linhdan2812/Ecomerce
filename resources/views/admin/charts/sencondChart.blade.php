
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