@extends('home.layout.index')

@section('content')
	
<!--文章 -->
<div class="am-g am-g-fixed blog-g-fixed bloglist">
  <div class="am-u-md-9">
    <article class="blog-main">
      <h2 class="am-article-title blog-title" style="font-weight: 700;">
        ×张毛爷爷，疯狂购物节
      </h2>
      <h4 class="am-article-meta blog-meta">{{ $pic[0]->created_at }}</h4>

      <div class="am-g blog-content">
        <div class="am-u-sm-12">
          <p>休闲零食是在人们闲暇、休息时所吃的食品，最贴切的解释是吃着玩的食品．主要分类有：坚果炒货、饼干糕点、枣类制品、糖果乳酪、豆干类、蜜饯、干果、膨化食品、
              糖果、酸角糕、鱼系列、肉制食品、茶饮冲泡等．随着生活水平的提高，休闲零食一直是深受广大人民群众喜爱的食品。休闲零食正在逐渐升格成为百姓日常的必需消费品，
              随着经济的发展和消费水平的提高，消费者对于休闲零食数量和品质的需求不断增长。很多人想不到的是，绿叶蔬菜还是胡萝卜素的优质来源，虽然略逊于胡萝卜，但远高于番茄，
              橙子和红薯。每100克深绿色的叶菜可以提供二到四毫克胡萝卜素，换算成维生素A，相当于成年人一日必须的三分之一到二分之一。</p>
          
          <strong class="blog-tit"><p>一张毛爷爷<span>丨</span>水果</p></strong>
          <div class="Row">
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[0]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[1]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[2]->pic }}"/></a>
            </li>
          </div>
          <p>水果是对我们身体很有益的一类食物。水果营养，指水果所带有的物质营养和文化营养。普通水果含有丰富的维生素、膳食纤维等物质营养，而创意文化水果还带有文化营养。</p>


         <strong class="blog-tit"><p>两张毛爷爷<span>丨</span>蔬菜</p></strong>
          <div class="Row">
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[3]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[4]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[5]->pic }}"/></a>
            </li>
          </div>
          
          <p>蔬菜是指可以做菜、烹饪成为食品的一类植物或菌类，蔬菜是人们日常饮食中必不可少的食物之一。蔬菜可提供人体所必需的多种维生素和矿物质等营养物质。</p>
          
          
         <strong class="blog-tit"><p>三张毛爷爷<span>丨</span>饮品</p></strong>
          <div class="Row">
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[6]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[7]->pic }}"/></a>
            </li>
          	<li>
                <a href="#"><img src="/uploads/{{ $pic[8]->pic }}"/></a>
            </li>
          </div>          
          
           <p>饮品是指能够满足人体机能正常需要，可以直接饮用，或者溶解、稀释等方式饮用的食品。一般来说，凡是不经过咀嚼（或轻微咀嚼）而直接食用的产品均属饮品的范畴，而饮品是只是食品产品中的一部分。</p>
          

        </div>
  
      </div>

    </article>


    <hr class="am-article-divider blog-hr">
    {{-- <ul class="am-pagination blog-pagination">
      <li class="am-pagination-prev"><a href="">&laquo; 上一页</a></li>
      <li class="am-pagination-next"><a href="">下一页 &raquo;</a></li>
    </ul> --}}
  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">

      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门话题</div>
        <ul class="am-list blog-list">
          <li><a href="/home/news/new4"><p>[公告]东北大米征服半个中国</p></a></li>
          <li><a href="/home/news/new2"><p>[公益]豆腐妈妈公益项目</p></a></li>
          <li><a href="/home/news/new3"><p>[公告]盲盒背后的千万级市场</p></a></li>
          <li><a href="/home/news/new5"><p>[安全]卖家注意：风险通报！</p></a></li>
          <li><a href="/home/news/new1"><p>[特惠]疯狂购物城</p></a></li>      
        </ul>
      </section>

    </div>
  </div>

</div>

@endsection