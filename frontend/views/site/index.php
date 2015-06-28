<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Find local bargains at BiddulphBargains';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Biddulph Bargains</h1>

		<p> Find the best and most recent deals here at BiddulphBargains</p>


    </div>

    <div class="body-content">

	<div>

        <div class="row">


            <div class="span12">
                <form action="<?php echo BaseUrl::base(true); ?>/site/categorieslanding" method="post">
					<div class="form-group">
			        <input type="text" name="keyword" placeholder="" class="form-control">
					</div>
					<div class="form-group">
			            <?= Html::submitButton('Search for offers', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                  this is a test
			        </div>
		        </form>
          </div>

                <p>Welcome to BiddulphBargains, your one stop shop for all the best deals and offers in Biddulph Town Centre. BiddulphBargains believe that getting a great deal
				is never a bad thing. However in small towns such as Biddulph, bargains and offers that are available are only spread through word of mouth and the occasional newsletter. Having all those
				offers available on one website will not only help you find the best deals, but also help strengthen the towns economy.</p>
				<p>There is no need to sign up to view these offers, simply use the search box above to find the type of deal or store you're looking for. Alternatively you can also use the category page
				to find the different deals across each of the offer types. <br>
				Don't forget to check out the events page for the latest news on what's going on in Biddulph</p>





        </div>

    </div>
</div>

</div>
