/**

 @Name：layuiAdmin 主页控制台
 @Author：贤心
 @Site：http://www.layui.com/admin/
 @License：GPL-2
    
 */


layui.define(function(exports){
  
  /*
    下面通过 layui.use 分段加载不同的模块，实现不同区域的同时渲染，从而保证视图的快速呈现
  */
  
  
  //区块轮播切换
  layui.use(['admin', 'carousel'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,carousel = layui.carousel
    ,element = layui.element
    ,device = layui.device();

    //轮播切换
    $('.layadmin-carousel').each(function(){
      var othis = $(this);
      carousel.render({
        elem: this
        ,width: '100%'
        ,arrow: 'none'
        ,interval: othis.data('interval')
        ,autoplay: othis.data('autoplay') === true
        ,trigger: (device.ios || device.android) ? 'click' : 'hover'
        ,anim: othis.data('anim')
      });
    });
    
    element.render('progress');
    
  });

  //数据概览
  layui.use(['admin', 'carousel', 'echarts'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,carousel = layui.carousel
    ,echarts = layui.echarts;

    $.ajax({
      url:"http://localhost/newxadmin/public/admin/apply/echartdata",
      type:"GET",
      success:function(res) {
        console.log(res)

        //轮播图1
        var echartsApp = [], options = [

          //部门分布情况
          {
            title : {
              text: '部门分布情况',
              x: 'center',
              textStyle: {
                fontSize: 14
              }
            },
            tooltip : {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              orient : 'vertical',
              x : 'left',
              data:['图文部','采风部','视频部','网站部','采编部','办公室']
            },
            series : [{
              name:'访问来源',
              type:'pie',
              radius : '55%',
              center: ['50%', '50%'],
              data:[
                {value:res.option1_data.count[0], name:'图文部'},
                {value:res.option1_data.count[1], name:'采风部'},
                {value:res.option1_data.count[2], name:'视频部'},
                {value:res.option1_data.count[3], name:'网站部'},
                {value:res.option1_data.count[4], name:'采编部'},
                {value:res.option1_data.count[5], name:'办公室'}
              ]
            }]
          },
          //男女分布情况
          {
            title : {
              text: '男女分布'
            },
            tooltip : {
              trigger: 'axis'
            },
            legend: {
              data:['男','女']
            },
            calculable : true,
            xAxis : [
              {
                type : 'category',
                data : ['图文部','采风部','视频部','网站部','采编部','办公室']
              }
            ],
            yAxis : [
              {
                type : 'value'
              }
            ],
            series : [
              {
                name:'男',
                type:'bar',
                data:res.option1_data.boy,
                itemStyle:{
                  normal:{
                    color:'#36a8ff'
                  }
                },
              },
              {
                name:'女',
                type:'bar',
                data:res.option1_data.girl,
                itemStyle:{
                  normal:{
                    color:'#ff394f'
                  }
                },
              }
            ]
          }
        ]
            ,elemDataView = $('#LAY-index-dataview').children('div')
            ,renderDataView = function(index){
          echartsApp[index] = echarts.init(elemDataView[index], layui.echartsTheme);
          echartsApp[index].setOption(options[index]);
          //window.onresize = echartsApp[index].resize;
          admin.resize(function(){
            echartsApp[index].resize();
          });
        };
        //没找到DOM，终止执行
        if(!elemDataView[0]) return;
        renderDataView(0);
        //监听数据概览轮播
        var carouselIndex = 0;
        carousel.on('change(LAY-index-dataview)', function(obj){
          renderDataView(carouselIndex = obj.index);
        });
        //轮播图2
        var echartsApp1 = [], options1 = [

          //部门分布情况
          {
            title : {
              text: '部门分布情况',
              x: 'center',
              textStyle: {
                fontSize: 14
              }
            },
            tooltip : {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              orient : 'vertical',
              x : 'left',
              data:['图文部','采风部','视频部','网站部','采编部','办公室']
            },
            series : [{
              name:'访问来源',
              type:'pie',
              radius : '55%',
              center: ['50%', '50%'],
              data:[
                {value:res.option2_data.count[0], name:'图文部'},
                {value:res.option2_data.count[1], name:'采风部'},
                {value:res.option2_data.count[2], name:'视频部'},
                {value:res.option2_data.count[3], name:'网站部'},
                {value:res.option2_data.count[4], name:'采编部'},
                {value:res.option2_data.count[5], name:'办公室'}
              ]
            }]
          },

          //男女分布情况
          {
            title : {
              text: '男女分布'
            },
            tooltip : {
              trigger: 'axis'
            },
            legend: {
              data:['男','女']
            },
            calculable : true,
            xAxis : [
              {
                type : 'category',
                data : ['图文部','采风部','视频部','网站部','采编部','办公室']
              }
            ],
            yAxis : [
              {
                type : 'value'
              }
            ],
            series : [
              {
                name:'男',
                type:'bar',
                data:res.option2_data.boy,
                itemStyle:{
                  normal:{
                    color:'#36a8ff'
                  }
                },
              },
              {
                name:'女',
                type:'bar',
                data:res.option2_data.girl,
                itemStyle:{
                  normal:{
                    color:'#ff394f'
                  }
                },
              }
            ]
          }
        ]
            ,elemDataView1 = $('#LAY-index-dataview1').children('div')
            ,renderDataView1 = function(index){
          echartsApp1[index] = echarts.init(elemDataView1[index], layui.echartsTheme);
          echartsApp1[index].setOption(options1[index]);
          //window.onresize = echartsApp[index].resize;
          admin.resize(function(){
            echartsApp1[index].resize();
          });
        };

        //没找到DOM，终止执行
        if(!elemDataView1[0]) return;
        renderDataView1(0);
        //监听数据概览轮播
        var carouselIndex1 = 0;
        carousel.on('change(LAY-index-dataview1)', function(obj){
          renderDataView1(carouselIndex1 = obj.index);
        });

      }
    });

    //监听侧边伸缩
    layui.admin.on('side', function(){
      setTimeout(function(){
        renderDataView(carouselIndex);
      }, 300);
    });
    
    //监听路由
    layui.admin.on('hash(tab)', function(){
      layui.router().path.join('') || renderDataView(carouselIndex);
    });
  });


  exports('console', {})
});