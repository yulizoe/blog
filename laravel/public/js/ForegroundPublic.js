window.onload=function(){
        //搜索功能
        $('#searchT').click(function(){
          if($('#key').val()==''){
           alert('请输入标题关键字');
        }else{
           $('#searchT').attr('href', "/searchT/"+ $('#key').val()); 
        } 
       });

        $('#searchA').click(function(){
          if($('#key').val()==''){
           alert('请输入作者');
        }else{
           $('#searchA').attr('href', "/searchA/"+ $('#key').val()); 
        }
      });

        $('#searchC').click(function(){
          if($('#key').val()==''){
           alert('请输入作者');
        }else{
           $('#searchC').attr('href', "/searchC/"+ $('#key').val()); 
        }
      });

        $('#searchD').click(function(){
          if($('#key').val()==''){
           alert('请输入日期');
        }else{
           $('#searchD').attr('href', "/searchD/"+ $('#key').val()); 
        }
      });

        //日期显示
         function tick() {
            var years,months,days;
            var intYears,intMonths,intDays;
            var today;
            today = new Date(); //系统当前时间
            intYears = today.getFullYear(); //得到年份,getFullYear()比getYear()更普适
            intMonths = today.getMonth() + 1; //得到月份，要加1
            intDays = today.getDate(); //得到日期
            years = intYears + "-";
            if(intMonths < 10 ){
            months = "0" + intMonths +"-";
            } else {
            months = intMonths +"-";
            }
            if(intDays < 10 ){
            days = "0" + intDays +" ";
            } else {
            days = intDays + " ";
            }
            
            timeString = years+months+days;
            Clock.innerHTML = timeString;
            }
            tick();






//导航变色
// function navstyle(){
// 	$('#nav a').click(function(){
// 		$('#nav a').removeClass('active');
// 		this.addClass('active');
// 		});
// 	}
// navstyle();

      }
