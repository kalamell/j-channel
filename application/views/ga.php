<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115038813-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115038813-1');
</script>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1922250448105014',
      xfbml      : true,
      version    : 'v2.12'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/css/jquery.fancybox.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/js/jquery.fancybox.min.js"></script>

<style type="text/css">
  .fancybox-skin { background-color: transparent; }
</style>

<script type="text/javascript">
  $(function() {
    
    <?php if ($this->session->flashdata('save')):?>
    $.fancybox.open({
      type: 'image',
      href: '<?php echo base_url('assets/images/thankyou.png');?>'
    })
    <?php endif;?>

    <?php if ($this->session->flashdata('expire')):?>
    $.fancybox.open({
      type: 'image',
      href: '<?php echo base_url('assets/images/sorry.png');?>'
    })
    <?php endif;?>

  })
</script>


