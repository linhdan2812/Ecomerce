// alert("hello");
const money = document.querySelector('#a')
// const
const _MONEY1 = "fixed1"
const _PRECENT1 = "percent1"
const _ALL1 = "all1"
const select = ''
const input = ''
const moneyElement = ` 
<div class="form-group" >
    <label for="">Số tiền giảm</label>
    <input type="number" name="value" class="form-control" min="1000" >
</div>
<div class="form-group" >
    <label for="">Giá trị đơn hàng tối thiểu</label>
    <input type="number" name="minbill" class="form-control" min="0">
</div>
`
const precentElement = ` <p>Số % giảm trên tổng giá trị đơn hàng<p> 
<input class="form-control" type="number" name="value" min="1" max="50">
`
const alltElement = `
<div class="form-group" >
    <label for="">Số % giảm trên 1 sản phẩm</label>
    <input type="number" name="value" class="form-control" min="1" max="50">
</div>`

const onChangeSelectEdit = () => {
    const mySelect1 = document.querySelector('#type1')
    console.log("mySelect1" ,mySelect1.value);
    money.innerHTML = mySelect1.value === _MONEY1 ? moneyElement : mySelect1.value ===  _PRECENT1 ? precentElement : mySelect1.value ===  _ALL1 ? alltElement : null
}