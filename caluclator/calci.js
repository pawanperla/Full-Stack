let exp = ""

function operator(op){
    exp = exp+op
    update()
}
function operand(ele) {
    exp = exp+ele
    update()
}
function clearResult() {
    exp = ""
    update()
}
function backspace() {
    exp = exp.slice(0,-1)
    update()
}
function update() {
    document.getElementById("res").value = exp
}
function calc() {
    let answer = eval(exp)
    exp = answer.toString()
    update()
}