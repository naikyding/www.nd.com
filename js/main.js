// ADMIN -----------------------------------------------------
const eventMail =
{
  'select': function(){
    $.post(
      'api.php?do=eventMailSelect',
      res => {
        if($('.productArea').css('display') == 'block'){
          $('.productArea').removeClass('d-block');
        }
        $('.areaSpace').show();
        $('.areaSpace').html(res);
        $('.slideDel').click(slideEv.del);
        $('.slideUpdate').click(slideEv.update);
        $('.slideImg input[type="file"]').change(function(e){
          let imgUrl = URL.createObjectURL(e.target.files[0]);
          $('img.showImg').attr('src', imgUrl);
          $('.showImgArea').show();
        });
        $('.copyMailBtn').click(copyMailEv);
        $('select[name="eventMail"]').change(eventMail.change);
        $('button.eventMailDel').click(eventMail.del);
      }
    ).fail(function(){
      console.log(`slide fail!`);
    });
  },
  'change': function(){
    $(this).children('option').removeAttr('selected');
    $.post(
      'api.php?do=eventMailChange',
      {
        table: $(this).attr('name'),
        item: $(this).attr('alt'),
        state: $(this).val()
      },
      (res)=>{
        if(res){
          Swal.fire({
            icon: 'success',
            title: '修改成功',
            showConfirmButton: false,
            timer: 1500
          });
          eventMail.select();
        }else{
          Swal.fire({
            icon: 'error',
            title: '發生錯誤',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    ).fail(()=>{console.log(`select Change Fail!`)});
  },
  del: function(){
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success ml-2',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        );

        $.post(
          'api.php?do=eventMailDel',
          {item: $(this).attr('alt')},
          (res)=>{
            if(res){
              Swal.fire({
                icon: 'success',
                title: '修改成功',
                showConfirmButton: false,
                timer: 1500
              });
              eventMail.select();
            }else{
              Swal.fire({
                icon: 'error',
                title: '發生錯誤',
                showConfirmButton: false,
                timer: 1500
              });
            }
          }
        ).fail(()=>{
          console.log(`eventMaiil Del Fail!`);
        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    });
  }
}
$('a.eventMail').click(eventMail.select);


//INDEX
var userIdA = 
{
  adminAcc: 'admin',
  adminPsw: '1234',
  hr: '--------',
  userAcc: 'naiky',
  userPsw:'1234'
}
console.log(userIdA);

//NAV Hover Ev
var menuArea = 
{
  'show': function (){
    $('a.menu_men').add('a.menu_women').add('a.menu_kids').add('a.menu_performance').add('a.menu_sale').removeClass('tr');
    $('div.menuMenArea').add('div.menuWomenArea').add('div.menuKidsArea').add('div.menuPerformanceArea').add('div.menuSaleArea').removeClass('d-block');
    $(this).addClass('tr');
    $(`div.menu${$(this).attr('alt')}Area`).addClass('d-block');
  },
  'close': function (){
    $(this).removeClass('d-block');
    $(`a.${$(this).attr('alt')}`).removeClass('tr');
  },
  size: function(){
    if($(window).width() > 991){
      $('a.menu_men').add('a.menu_women').add('a.menu_kids').add('a.menu_performance').add('a.menu_sale').mouseenter(menuArea.show);
      $('div.menuMenArea').add('div.menuWomenArea').add('div.menuKidsArea').add('div.menuPerformanceArea').add('div.menuSaleArea').mouseleave(menuArea.close);
    }else{
      $('a.menu_men').add('a.menu_women').add('a.menu_kids').add('a.menu_performance').add('a.menu_sale').off();
      $('div.menuMenArea').add('div.menuWomenArea').add('div.menuKidsArea').add('div.menuPerformanceArea').add('div.menuSaleArea').off();
    }
  }
}
menuArea.size();
$(window).resize(()=>{
  menuArea.size();
});

//search Ev
$('.searchArea').hide();
$('#searchBtn div.x').hide();
$('#searchBtn').click(function(){
  $('#searchBtn div.o').toggle();
  $('#searchBtn div.x').toggle();
  $('.searchArea').slideToggle();
});
$('#searchForm label').click(function(){
  if($(this).siblings().val() != ''){
    $('#searchForm').submit();
  }
});


// login EV
$('#loginForm').submit(function(e){
  e.preventDefault();
  $.post('api.php?do=login', $('#loginForm').serialize(), (data)=>{
    if(data){ //admin logIN
      if(data != $('input[name="acc"]').val()){
        let res = JSON.parse(data);
        // console.log(JSON.parse(data));
        $('body').load(location=location.origin+'/s1080417/www.nd.com/'+res.url);
        localStorage.setItem('user', res.user); 
      }else{ //customer login
        localStorage.setItem('userName', data);
        //setToSession EV
        setToSession();
        document.querySelector('#loginForm').reset(); //RESET FORM INPUT
        $('p.ipF').text(''); //INPUT FAIL TEXT RESET
        $('input[name="acc"]').removeAttr('style'); //input acc mark reset
        $('#logInModal').modal('hide');
        signInState();
      }
    }else{
      $('p.ipF').text('帳號或密碼不正確');
    }
  }).fail(()=>{console.log('loginFromFail!!')});
});
// logIn INPUT EV
$('input[name="acc"]').add('input[name="psw"]').keyup(function(e){
  if($(this).attr('name') == 'acc'){
    $.post('api.php?do=check', {index:$(this).attr('name'), val:e.target.value}, function(data){
      if(data){
        $('input[name="acc"]').css('borderColor','green');
        $('.form-control:focus').css('boxShadow','0 0 0 0.2rem rgba(63,191,127,.25)');
        $('#accHelp').text('');
      }else{
        $('input[name="acc"]').css('borderColor','red');
        $('.form-control:focus').css('boxShadow','0 0 0 0.2rem rgba(255,30,0,.25)');
        $('#accHelp').text('Please enter valid ND Member ID or email!');
      }
    }).fail(function(){
      console.log(`input AJAX Fail!!`);
    });
  }
});

//setToSession Ev
function setToSession(){
  let userName = localStorage.getItem('userName');
  let cartList = JSON.parse(localStorage.getItem('cartList'));
  let cartNum = localStorage.getItem('cartListItemNum');
  if(cartList != '' && cartList != null){
    $.post(
      'api.php?do=setListToSession',
      {
        'user': userName,
        'cartList': cartList,
        'cartListItemNum': cartNum
      },
      (res)=>{
      }
    ).fail(()=>{console.log(`SESSION set localStorage FAIL!`)});
  }else{
    $.post(
      'api.php?do=getListFromSession',
      {
        user: userName
      },
      (res)=>{
        if(res){
          let data = JSON.parse(res);
          localStorage.setItem('cartList', JSON.stringify(data.cartList));
          localStorage.setItem('cartListItemNum', parseInt(data.cartListItemNum));
          cartListSelect();
          cartToBagBtnEv();
        }
      }
    ).fail(()=>{console.log(`getSessionFail!`)});
  }
}

//couponForm contactUs  EV
$('#couponForm').submit(function(e){
  e.preventDefault();
  $.post(
    'api.php?do=couponFormEv',
    $('#couponForm').serialize(),
    (res)=>{
      if(res){
        Swal.fire(
          'THANKS FOR SIGNING UP.!',
          'You have been added to our mailing list.',
          'success'
        )
        $('.inputContent').hide();
        $('.inputSpace').html(`
        <h2 class="text-center text-light">THANKS FOR SIGNING UP.</h2>
        <p class="text-center text-light">You have been added to our mailing list.</p>
        `);
      }else{
        Swal.fire({
          position: 'top-center',
          icon: 'error',
          title: '發生錯誤',
          showConfirmButton: false,
          timer: 1500
        });
      }
    }
  ).fail(()=>{
    console.log(`couponForm Fail!`);
  });
})

//delSession Ev
function delSession(){
  $.post(
    'api.php?do=delSession',
    {
      userName: localStorage.getItem('userName')
    },
    (res)=>{
    }
  ).fail(()=>{console.log(`delSessionFAIL!`)});
}

// signIn Ev reset
signInState();
function signInState(){
  let userName = localStorage.getItem('userName');
  if(userName != '' && userName != null){
    let aBtn = $('a.nav-link.signIn').clone(); //copy original <a>
    $('a.nav-link.signIn span').eq(1).hide();
    $('span.userName').text(`Hi ${userName}`);
    // $('a.nav-link.signIn img').after(`Hi ${userName}`);
    $('a.nav-link.signIn').attr(
      {
        'class': 'nav-link dropdown-toggle signIn',
        'id': 'navbarDropdown',
        'role': 'button',
        'data-toggle': 'dropdown',
        'style': 'color:#C79C57',
        'data-target': ''
      });
    $('a.nav-link.dropdown-toggle').after(`
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item signOut" href="#">Sign Out</a>
        <a class="dropdown-item goToBag" >Bag</a>
      </div>
    `);
    $('a.goToBag').click(()=>{
      location.href=location.origin+'/s1080417/www.nd.com/cart';
    });
    $('a.signOut').click((e)=>{
      e.preventDefault();
      $('li.signIn').html(aBtn);
      $('li.signIn').removeClass('show');
      $('a.nav-link.signIn span').eq(1).show();
      let itemArray = ['userName', 'cartList', 'cartListItemNum'];
      itemArray.forEach(val => localStorage.removeItem(val));
      cartListSelect();
      cartListBtnState = 0;
      cartToBagBtnEv();
    });
  }
}


//CartList Ev -----------------------------------
var cartListBtnState = 0; //cartList BtnEv state RESET
var timeOutID; 
$('.cartQ').hide();
$('.cart').hide();

//初始化cartList
if(localStorage.getItem('cartList') != null && localStorage.getItem('cartList') != ''){
  cartListSelect();
  cartToBagBtnEv();
}else{
  cartToBagBtnEv();
}

//cart  BAG BTN EV
function cartToBagBtnEv(){
  let cartState = localStorage.getItem('cartListItemNum');
  let carlist = localStorage.getItem('cartList');
  if(cartState != null && carlist != null){
    $('a.cartA').click(function(){
        $('.cart').slideToggle();
    });
    $('.cart').mouseleave(function(){
        clearTimeout(timeOutID);
        $('.cart').slideUp();
    })
    $('.bagBtn_header').add('.cartListArea').show();
    $('.cartListEmpty').removeClass('d-block');
    cartListBtnState = 1;
  }else{
    $('.cartQ').hide();
    $('.cart').hide();
    $('.cartA').add('.cart').off();
    $('.bagBtn_header').add('.cartListArea').hide();
    $('.cartListEmpty').addClass('d-block');
  }
}

function cartListSelect(state){
  let cartListDate = JSON.parse(localStorage.getItem('cartList'));
    $.post(
        'api.php?do=addToBag',
        {list:cartListDate},
        (res)=>{
          if(res){
            let data = JSON.parse(res);
            localStorage.setItem('cartListItemNum', data.num);
            $('.cart').html(data.html);
            if($('.cartListArea').length != 0){
              $('.cartListArea').children('table').find('tbody').html(data.cartTable);
              $('.itemN').text(data.num);
              $('span.totalPrice').text(data.total);
            }
            $('.less').add('.plus').click(cartTableNumChange);
            $('.cartBtn').click(()=>{
              location.href=location.origin+'/s1080417//www.nd.com/cart';
            });
            if(state){
              // 彈出cartArea
              $('.cart').slideDown();
              timeOutID = setTimeout(function(){ //自動收回cartList
                $('.cart').slideUp();
              },3000);
            }
            if(localStorage.getItem('userName')){
              setToSession();
            }
            // widows height (高度) if OVER 3 product 
            if(cartListDate.length > 3)$('.cartListItem').css('height', '490px');
            // cartListDel Ev
            $('.ListItemDelBtn').add('.cartTableDel').click(cartListDelBtnEv);
            //form reset && sizeBtn reset
            if($('.cartForm').length!=0)document.querySelector('.cartForm').reset();
            $('.sizeSelectA').removeAttr('style');
            if($('.bagSvg').siblings('span').length != 0){
              $('.bagSvg').siblings('span').text(data.num);
            }else{
              $('.bagSvg').after(`<span class="align-middle text-center d-inline-block " style="font-size:.5rem" id="cartQ">${data.num}</span>`);
            }
            if(cartListBtnState == 0){
              cartToBagBtnEv();
            } 
          }else{
            $('.cart').html('');
            $('.bagSvg').siblings().remove();
            delSession();
          }
      }).fail(function(){
        console.log('ADD BAG AJAX FAIL!');
      })
}

// ADD TO BAG BTN EV
$('.addBagBtn').click(function() {
  if($('input[name="size"]').val() != ''){ // 有選擇尺吋
    if(localStorage.getItem('cartList') != null){
      let cartList = JSON.parse(localStorage.getItem('cartList'));
      let state = 0;
      cartList.forEach((val, key)=>{
        if(cartList[key]['id']==$('input[name="id"]').val() && cartList[key]['table']==$('input[name="table"]').val() && cartList[key]['size']==$('input[name="size"]').val()){
          cartList[key]['carNum'] = parseInt(cartList[key]['carNum']) + parseInt($('#numSelect').val());
          state = 1;
        }
      });
      if(state == 0){
        cartList.push(
          {
            table: $('input[name="table"]').val(),
            cartPrice: parseInt($('input[name="cartPrice"]').val()),
            cartColor: $('input[name="cartColor"]').val(),
            size: $('input[name="size"]').val(),
            carNum: parseInt($('#numSelect').val()),
            id: $('input[name="id"]').val()
          }
        );
      }
      localStorage.setItem('cartList', JSON.stringify(cartList));
    }else{ //list == null
      let cartProduct = 
        {
          table: $('input[name="table"]').val(),
          cartPrice: parseInt($('input[name="cartPrice"]').val()),
          cartColor: $('input[name="cartColor"]').val(),
          size: $('input[name="size"]').val(),
          carNum: parseInt($('#numSelect').val()),
          id: $('input[name="id"]').val()
        };
      localStorage.setItem('cartList', `[${JSON.stringify(cartProduct)}]`);
    }
    cartListSelect(1);// 新增才下拉
    clearTimeout(timeOutID);
  }else{
    $('.sizeSelect').html('<span style="color:red">　請選擇尺吋!</span>');
  }
});

// cartListDel Ev
function cartListDelBtnEv() {
  let cartList = JSON.parse(localStorage.getItem('cartList'));
  // console.log(cartList[$(this).attr('alt')]);
  cartList = JSON.stringify(cartList.filter((val, index)=>index != $(this).attr('alt')));
  if(cartList == '[]'){
    localStorage.removeItem('cartList');
    localStorage.removeItem('cartListItemNum');
    cartListSelect();
    cartListBtnState = 0;
    cartToBagBtnEv();
  }else{
    localStorage.setItem('cartList', cartList);
    cartListSelect();
  }
}

//CartTableNumChange Ev
function cartTableNumChange() {
  let cartList = JSON.parse(localStorage.getItem('cartList'));
  let num = $(this).siblings('input').val();

  if($(this).attr('class') == 'less'){
    if(num != 1){
      num --;
      cartList[$(this).attr('alt')]['carNum'] = num;
      localStorage.setItem('cartList', JSON.stringify(cartList));
      cartListSelect();
    }
  }else if($(this).attr('class') == 'plus'){
    
    if(num < 10){
      num ++;
      cartList[$(this).attr('alt')]['carNum'] = num;
      localStorage.setItem('cartList', JSON.stringify(cartList));
      cartListSelect();
      // 確認數量是否足夠↓
      // let table = cartList[$(this).attr('alt')]['table'];
      // let id = cartList[$(this).attr('alt')]['id'];
      // let size = cartList[$(this).attr('alt')]['size'];
      // checkNum(table, id, size, num);
    }
  }
}

function checkNum(table, id, size, num){
  $.post(
    'api.php?do=numChange',
    {
      'table': table,
      'id': id,
      'size': size,
      'num': num
    },
    (res)=>{
      console.log(res);
    }
  ).fail(
      ()=>{
      console.log(`tableNum AJAX FAIL!`);
  });
}
//CartList Ev---------------------------------------------------- END

//cart
$('button.checkOutBtn').click(checkOutEvBtn);
function checkOutEvBtn(){
  if(localStorage.getItem('userName')){ //login
    console.log(111);
  }else{ //logOut
    $('#logInModal').modal('show');
  }
}

function copyMailEv(e){
  e.preventDefault();
  let val = document.querySelector(`#copy${$(this).attr('alt')}`);
  window.getSelection().selectAllChildren(val);
  document.execCommand ("Copy");
  window.getSelection().selectAllChildren(document.querySelector('button'));
  Swal.fire({
    icon: 'success',
    title: `已復製 ${$(`#copy${$(this).attr('alt')}`).text()}`,
    showConfirmButton: false,
    timer: 1500
  })
}

// SHOP ALL MEN

//filterEv
$('button.filterBtn').click(filterEv);
function filterEv(){
  // $('div.filterMenu').hide();
}
