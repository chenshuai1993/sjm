<?php
// source: /data/html/sjm/app/view/home/index.latte

use Latte\Runtime as LR;

class Template64c52423c8 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		/* line 1 */
		$this->createTemplate("../layouts/layout.latte", $this->params, "include")->renderToContentType('html');
?>

<div class="container">
    <div class="jumbotron">
        <h1 class=".text-center">我的mvc框架</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-12">
                <input type="text" class="col-lg-8" id="title" placeholder="请输入标题">
                <span class="col-lg-4"><button id="add" class="btn btn-primary btn-sm">添加</button></span>
            </div>

            <div class="col-lg-12">
<?php
		if ($items) {
?>                <ul>
                    <?php
			$iterations = 0;
			foreach ($items as $item) {
?>

                        <li id="<?php echo LR\Filters::escapeHtmlAttr($item->id) /* line 19 */ ?>">
                            <span class="col-lg-8"><?php echo LR\Filters::escapeHtmlText($item->title) /* line 20 */ ?></span>
                            <button  class="btn btn-primary btn-sm <?php echo LR\Filters::escapeHtmlAttr($item->status == false ? 'btn-success' : NULL) /* line 21 */ ?>">完成</button>
                            <button id="del" class="btn btn-danger btn-sm">删除</button></li>
<?php
				$iterations++;
			}
?>
                </ul>
<?php
		}
?>
            </div>

        </div>
    </div>
</div>
<script>
    $(function(){
        $("#add").click(function(){
            var title = $('#title').val();
            $.ajax({
                type:'post',
                url:'/home/add',
                data:{'title':title},
                cache: false,
                success:function(data){
                    console.log(data);
                }

            });
        });


        $(".btn-primary").click(function(){
            var id = $(this).parent('li').attr('id');
            $.ajax({
                type:'post',
                url:'/home/submit',
                data:{'id':id},
                cache: false,
                success:function(data){
                    console.log(data);
                }

            });
        });

        $(".btn-danger").click(function(){
            var id = $(this).parent('li').attr('id');
            $.ajax({
                type:'post',
                url:'/home/del',
                data:{'id':id},
                cache: false,
                success:function(data){
                    console.log(data);
                }

            });
        });



    })

</script>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 18');
		
	}

}
