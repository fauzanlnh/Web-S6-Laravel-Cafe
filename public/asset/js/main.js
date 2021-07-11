const keranjang = document.getElementById('keranjang')
const modal = document.getElementById('myModal')
const close = document.getElementById("close")

close.onclick = function () {
    modal.style.display = "none";
}
keranjang.onclick = function () {
    modal.style.display = "block";
}
let products = []
const btn = document.getElementsByClassName('beli')

for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener('click', () => {
        const harga = event.target.parentElement.parentElement.children[3].children[0].innerText
        console.log(harga)
        let product = {
            gambar: event.target.parentElement.parentElement.parentElement.children[0].children[0].src,
            nama: event.target.parentElement.parentElement.children[0].innerText,
            harga: event.target.parentElement.parentElement.children[3].children[0].innerText,
            qty: 1,
            total: parseInt(event.target.parentElement.parentElement.children[3].children[0].innerText)

        }
        addItemToLocal(product)

    })
}

function addItemToLocal(product) {
    let cartItem = JSON.parse(localStorage.getItem('prdInCart'))
    if (cartItem === null) {
        products.push(product)
        localStorage.setItem('prdInCart', JSON.stringify(products))

    } else {
        cartItem.forEach(item => {
            if (product.nama == item.nama) {
                product.qty = item.qty += 1;
                product.total = item.total += product.total;
            } else {
                products.push(item)
            }
        });
        products.push(product)
    }
    localStorage.setItem('prdInCart', JSON.stringify(products))
    window.location.reload()

}

function dispCartItem() {
    let html = '';
    let cartItem = JSON.parse(localStorage.getItem('prdInCart'))
    cartItem.forEach(item => {
        html += `
        <div class="cart flex justify-evenly mb-3">
            <div class='ml-4'>
                <div class='text-white font-bold '>${item.nama}</div>
                <div class='text-white text-sm mt-2'> Sub Jumlah : ${item.qty}</div>
                <div class='text-white text-sm'> Sub Total: ${item.total}</div>
            </div>  
            <div class=' flex flex-col justify-around' >
                <button class='hapus text-white mt-1'>x</button>
            </div>
        </div>
        `
    });
    document.querySelector('.isi-modal').innerHTML = html;
}
dispCartItem()

function totalHarga() {
    let total = 0
    let cartItem = JSON.parse(localStorage.getItem('prdInCart'))
    cartItem.forEach(item => {
        total = item.total += total
    })
    document.querySelector('.total').innerHTML = (`total yang harus kamu bayar : ${total}K`)
}
totalHarga()
let removeItem = document.getElementsByClassName('hapus')
for (var i = 0; i < removeItem.length; i++) {
    let removeBtn = removeItem[i]
    removeBtn.addEventListener('click', () => {
        let cartItem = JSON.parse(localStorage.getItem('prdInCart'))
        console.log(event.target.parentElement.parentElement.children[0].children[0].innerText);
        cartItem.forEach(item => {
            if (item.nama != event.target.parentElement.parentElement.children[0].children[0].innerText) {
                products.push(item)
            }
        });
        localStorage.setItem('prdInCart', JSON.stringify(products))
        window.location.reload()
    })
}
