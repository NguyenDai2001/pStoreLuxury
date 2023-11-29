



//data_idSP: attribute
// input_id: id
if (localStorage.getItem('cart') == null) {

    localStorage.setItem('cart', [])


} else {
    print_cart()
}
function add_cart(input_id, size) {

    let str_cart = ''
    if (localStorage.getItem('cart') == '') {
        localStorage.setItem('cart', input_id)
        localStorage.setItem('handle_cart', input_id)
        localStorage.setItem('SL_' + input_id, 1)

        str_cart = str_cart + input_id

    } else {

        str_cart = localStorage.getItem('cart')
        str_cart = str_cart + '-' + input_id
        localStorage.setItem('cart', str_cart)
        print_cart()
        check_input()
    }



    if (!localStorage.getItem('Size_SP')) {
        let arr_size = [
            {
                id_sp: input_id,
                size_sp: size
            }
        ]
        let str_size = JSON.stringify(arr_size)
        localStorage.setItem('Size_SP', str_size)

    } else {
        let ob_size = {
            id_sp: input_id,
            size_sp: size
        }
        let str_size = localStorage.getItem('Size_SP')
        let arr_size = JSON.parse(str_size)

        let arr_size_new = [...arr_size, ob_size]
        let str_size_new = JSON.stringify(arr_size_new)
        localStorage.setItem('Size_SP', str_size_new)
    }

}


// tính số lượng đầu vào Giống nhau
function check_input() {
    let s_cart = localStorage.getItem('cart')
    let arr_cart = s_cart.split('-')
    let arr_result_cart = print_cart()
    let count = 0
    arr_result_cart.map((list_cart) => {
        arr_cart.map((item) => {
            if (item == list_cart) {
                count = count + 1
            }
        })
        localStorage.setItem('SL_' + list_cart, count)
        count = 0
    })

}

// Xử lý id chùng nhau
function print_cart() {
    let s_cart = localStorage.getItem('cart')
    let arr_cart = s_cart.split('-')
    let filter_cart = new Set()
    arr_cart.map((item) => {
        filter_cart.add(item)
    })
    result = []
    result = [...filter_cart]
    localStorage.setItem('handle_cart', result)
    return result

}


// tăng giảm sản phẩm
function plus_cart(id, size) {
    localStorage.setItem('SL_' + id, Number(localStorage.getItem('SL_' + id)) + 1)
    let getSL = document.getElementById('SL_' + id)
    getSL.innerText = localStorage.getItem('SL_' + id)
    add_cart(id, size)



}
function subtract_cart(id) {
    if (localStorage.getItem('SL_' + id) > 1) {
        localStorage.setItem('SL_' + id, Number(localStorage.getItem('SL_' + id)) - 1)
        let getSL = document.getElementById('SL_' + id)
        getSL.innerText = localStorage.getItem('SL_' + id)
        delete_quantity_item_cart(id)
    }


}


// xoa số lượng trong item cart 
function delete_quantity_item_cart(id) {
    let s_cart = localStorage.getItem('cart')
    let arr_cart = s_cart.split('-')

    let index_arr = 0
    let new_arr2 = []
    index_arr = arr_cart.findIndex((item) => {
        return item == id
    })
    // localStorage.removeItem('SL')
    arr_cart.splice(index_arr, 1)
    new_arr2 = arr_cart.join('-')
    localStorage.setItem('cart', new_arr2)
    print_cart()
    check_input()
}

// xoa item cart 
function delete_item_cart(id) {
    let s_cart = localStorage.getItem('cart')
    let arr_cart = s_cart.split('-')

    let index_arr = 0
    let new_arr2 = []
    index_arr = arr_cart.filter((item) => {
        return item != id
    })
    // localStorage.removeItem('SL')
    new_arr2 = index_arr.join('-')
    localStorage.setItem('cart', new_arr2)
    print_cart()
    check_input()
    // hidden item 
    localStorage.removeItem('SL_' + id)
    document.getElementById('item_cart_' + id).style.display = 'none'


    connect_data()
    //fix lỗi vặt
    localStorage.removeItem('SL_')
    localStorage.removeItem('Size_SP')

}



// ajax chuyền dữ liệu từ javascript cho php
function connect_data() {
    let getData = (localStorage.getItem('cart')).split('-')
    let getData2 = (localStorage.getItem('handle_cart')).split(',')
    $.ajax({
        type: 'post',
        url: 'ajax/add_cart.php',
        data: {
            data_cart: getData,
            data_handle_cart: getData2
        },
        // success: function (data) {
        //     $('#delete' + id).hide();
        // }
    });
}
connect_data()
