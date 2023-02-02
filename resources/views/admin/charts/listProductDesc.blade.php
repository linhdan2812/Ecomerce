
<div class='col-sm-6'>
  <h3>Danh sách sản phẩm bán được nhiều nhất!</h3>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-4">
          <label for="">Từ:</label>
          <input class="date form-control" id="fromlistProductDESC" width="50%" value="" type="text">
        </div>
        <div class="col-sm-4">
          <label for="">Tới:</label>
          <input class="date form-control" id="tolistProductDESC" width="50%" value="" type="text">
        </div>
        <div class="col-sm-4">
          <button class="btn btn-success" id="searchlistProductDESC">Tìm kiếm</button>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-sm-12">
          <ul class="list-group" id="listProductDESC">
          </ul>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
      const format = num => {
          const n = String(num),
                p = n.indexOf('.')
          return n.replace(
              /\d(?=(?:\d{3})+(?:\.|$))/g,
              (m, i) => p < 0 || i < p ? `${m},` : m
          )
      }
      $('.date').datepicker({  
        format: 'dd-mm-yyyy'
      });
      let url = "{{route('listProduct')}}"
      let text1 = '';
      let oldname = '';
        $.get(url,{
          }).done(function( data ) {
            if( data.length === 0 || data.length == 'undefined'){
              text += `<li class="list-group-item">Không có dự liệu nào phù hợp!!!</li>`;
            }
            else {
              result = data.reduce(function(r, a) {
                r[a[0]] = r[a[0]] || [];
                r[a[0]].push(a);
                return r;
              }, Object.create(null));
              const ArrResult = Object.values(result);
              for (let index = 0; index < ArrResult.length; index++) {
                const element = ArrResult[index];
                let sum = 0;
                let a = '';
                let b = 0;
                const result = element.filter(function(item){
                  a = item[0],
                  b = sum += item[1];
                });
                text1 += `<li class="list-group-item">${index + 1 } Sản phẩm: ${a} Số lần: ${b} VND</li>`;
              }
            }
          document.getElementById('listProductDESC').innerHTML = text1;
        });
      $('#searchlistProductDESC').click(function(){
        let url = "{{route('listProductSoft')}}"
        let from = $('#fromlistProductDESC').val()
        let to = $('#tolistProductDESC').val();
        let text = '';
        $.get(url,{
          to : to,
          from: from,
          }).done(function( data ) {
            if( data.length === 0 || data.length == 'undefined'){
              text += `<li class="list-group-item">Không có dự liệu nào phù hợp!!!</li>`;
            }
            else {
              result = data.reduce(function(r, a) {
                r[a[0]] = r[a[0]] || [];
                r[a[0]].push(a);
                return r;
              }, Object.create(null));
              const ArrResult = Object.values(result);
              for (let index = 0; index < ArrResult.length; index++) {
                const element = ArrResult[index];
                let sum = 0;
                let a = '';
                let b = 0;
                let arr2 = [];
                const result = element.filter(function(item){
                  a = item[0],
                  b = sum += item[1];
                });
                text += `<li class="list-group-item">${index + 1 } Sản phẩm: ${a} Số lần: ${b}</li>`;
              }
            }
          document.getElementById('listProductDESC').innerHTML = text;
        });
      })
    });
</script>