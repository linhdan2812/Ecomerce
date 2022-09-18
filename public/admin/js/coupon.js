// alert("hello");
const money = document.querySelector('#money')
// const
const _MONEY = "fixed"
const _PRECENT = "percent"
const _ALL = "all"
const select = ''
const input = ''
const moneyElement = ` 
<div class="form-group" >
    <label for="">Số tiền giảm</label>
    <input type="number" name="value" class="form-control">
</div>
<div class="form-group" >
    <label for="">Giá trị đơn hàng tối thiểu</label>
    <input type="number" name="value" class="form-control">
</div>
`
const precentElement = ` <p>Số % giảm trên tổng giá trị đơn hàng<p> 
<input class="form-control">`
const onChangeSelect = () => {
    const mySelect = document.querySelector('#type')
    console.log("mySelect" ,mySelect.value);
    money.innerHTML = mySelect.value === _MONEY ? moneyElement : mySelect.value ===  _PRECENT ? precentElement : null
}