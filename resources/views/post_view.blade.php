@extends('layouts.app')

@section('css')
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{asset('/css/post_view.css')}}">
@endsection

@section('content')
<div class="container all">
       <div class="col-12 top">
              <div class="avatar"></div>
              <div class="call">
                     <div class="name">賈寶枚</div>
                     <div class="location">台中市</div>
              </div>
              <div class="right">
                     <div class="days">10天前</div>
                     <div class="like">
                            <i class='hicon bx bxs-heart' style='color:#f90404'></i>+99
                     </div>
                     <div class="language">語言</div>
              </div>
       </div>
       <div class="col-12 aim">
              <div class="tag">#我想學日文</div>
              <div class="goodat">我擅長
                     <span class="good_content">日文的口說以及讀寫</span>
              </div>
              <div class="wants">我想學
                     <span class="wants_content">網站的前端八八八</span>
              </div>
              <div class="line"></div>
       </div>
       <div class="col-12 main">
              <div class="post">
                     在不是歷史的電視劇「宰相劉羅鍋」中，有一位令人討厭，卻為乾隆皇帝所歡喜的和珅大壞蛋，他自嘲說：「忠臣人人尊敬，我不是忠臣；奸臣人人討厭，我也不是奸臣；我只是一個弄臣而已！」
                     一代名君賢主的乾隆皇帝，喜歡忠臣嗎？他需要忠臣，但他不歡喜忠臣的耿直；他喜歡奸臣嗎？當然他不喜歡奸臣！他喜歡什麼呢？他喜歡弄臣和珅！
                     弄臣是什麼？弄臣不是忠臣，但也不是奸臣！他為了討好主子，一切以主子馬首是瞻；他奉承主子，逢迎拍馬。弄臣是小丑的角色，但沒有小丑那麼可愛。
                     小丑在戲劇裏，不是一個大角色，但也不是一個小角色。他逗人取笑，給人歡喜；他在大忠大奸之外，不像弄臣，只討一個人歡喜，他為萬千的觀眾增加笑料。
                     在舞台上演忠臣，要有忠臣的耿直氣勢；演奸臣，要有奸臣的邪惡嘴臉。演小丑不容易，因為舞台上的角色，有「忠肝義膽」，有「有情有義」，有「大奸大惡」，有「老奸巨滑」，各種人等都有他好壞的重量，唯有小丑，他沒有重量。
                     一般人喜歡看小丑的演出，主要的，就是看小丑的逗趣如何？小丑也有高級的，也有低級的。高級的小丑，詼諧風趣，一言一動都能讓人捧腹；低級的小丑，只有裝腔作勢，損人而已。
                     人生，也是一個舞台，我們在世間上做不到一個大忠臣；但是寧可做小丑，也不要做奸臣。</div>
              <div class="photo"><img src="https://cdn.voicetube.com/assets/thumbnails/W86cTIoMv2U.jpg" width="610px"
                            alt=""></div>
       </div>
       <div class="send_button">
              <i class='plane bx bxs-paper-plane' style='color:#fefefe'  ></i>
       </div>
</div>
@endsection


@section('js')

@endsection