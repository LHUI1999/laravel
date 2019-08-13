$(function() {
    // 全选
    $("#checkAll input").click(function(){
        var flag = $(this).prop("checked");
        if(flag) {
            $(".check label input").prop("checked", true);
            $("#checkAll label").css("background-image", "url(/h/images/confirm.png) no-repeat center left");
            $(".check label").css("background-image", "url(/h/images/confirm.png) no-repeat center");
        } else {
            $(".check label input").prop("checked", false);

            $("#checkAll label").css("background-image", "url(/h/images/confirm_no.png) no-repeat center left");
            $(".check label").css("background-image", "url(/h/images/confirm_no.png) no-repeat center");
        }
       
        counts();
        totalPrice();
    });

    //单选
    $(".check input").click(function() {
        var flag = $(this).prop("checked"); //获取当前input的状态
        var CL = $(".check input").length; //列表长度；
        var CH = $(".check input:checked").length; //列表中被选中的长度

        if(flag) {
            $(this).parent("label").css("background-image", "url(/h/images/confirm_no.png) no-repeat center");
        } else {
            $(this).parent("label").css("background-image", "url(/h/images/confirm_no.png) no-repeat center");
        }

        if(CL == CH) {
            $("#checkAll input").prop("checked", true);
            $("#checkAll label").css("background", "url(/h/images/confirm.png) no-repeat center left");
        } else {
            $("#checkAll input").prop("checked", false);
            $("#checkAll label").css("background", "url(/h/images/confirm.png) no-repeat center left");
        }
        counts();
        totalPrice();
    })

    //数目加
    $(".add").click(function() {
        var num = $(this).prev().val();
        var price = parseFloat($(this).parent().siblings(".price").text());
        num++;
        $(this).prev().val(num);

        //      小计
        $(this).parent().siblings(".subtotal").text((price * num).toFixed(2));
        counts();
        totalPrice();
    })

    //数目减
    $(".sub").click(function() {
        var num = $(this).next().val();
        var price = parseFloat($(this).parent().siblings(".price").text());
        num--;

        if(num <= 0) {
            num = 0
        }
        $(this).next().val(num);

        //      小计
        $(this).parent().siblings(".subtotal").text((price * num).toFixed(2));
        counts();
        totalPrice();
    })

    //文本框脱里焦点处理
    $('.num').each(function(i) {
        $(this).blur(function() {
            let p = parseFloat($(this).parents('tr').find(".subtotal").text());
            let c = parseFloat(this.value);
            console.log(p*c);
            $(this).parents('tr').find(".subtotal").text((c * p).toFixed(2));
            counts();
            totalPrice();
        })
    })

    //单行删除
    $(".del button").click(function() {
        var flag = $(this).parent().siblings().find("input").prop("checked");
        if(flag) {
            if(confirm("是否确定删除")) {
                $(this).parents("tr").remove();
                var CL = $(".check input").length; //列表长度；
                if(CL == 0) {
                    $("#checkAll label input").prop("checked", false);
                    $("#checkAll label").css("background", "url(/h/images/confirm_no.png) no-repeat center left");
                }
                counts();
                totalPrice();
            }
        }
    })

    //全删除
    $("#checkAll button").click(function() {
        var flag = $(this).prev().children().prop("checked");
        //        console.log(flag);
        if(flag) {

            if(confirm("是否确定删除")) {

                $(".check").parent().remove();
                var CL = $(".check input").length; //列表长度；

                if(CL == 0) {
                    $("#checkAll label input").prop("checked", false);
                    $("#checkAll label").css("background", "url(/h/images/confirm_no.png) no-repeat center left");
                }
                counts();
                totalPrice();
            }

        }
    })

    //总价格
    totalPrice();

    function totalPrice() {
        var prices = 0;
        $('.check input:checked').each(function(i) {
            console.log()
            prices += parseFloat($(this).parents("tr").find('.subtotal').text());
        })
        $('#total').text(prices);
    }
    //总数目
    counts();

    function counts() {
        var sum = 0;
        $('.check input:checked').each(function(i) {
            sum += parseInt($(this).parents("tr").find('.num').val());
        })
        $('#numAll').text(sum);
    }

})