<?php
create_block('call-request', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(

    ), $atts);

	return "
        <form method=\"dialog\" class=\"call-request\" $dom_atts>
                <h3 class=\"call-request__title\">Заявка на обратный звонок</h3>
              <Input label=\"Имя\" dom-name=\"name\"></Input>
              <Input label=\"Номер телефона\" type=\"tel\" dom-name=\"phone\"></Input>
              <Input label=\"E-mail\" dom-name=\"email\" type=\"email\"></Input>
              <Textarea label=\"Комментарий\" dom-name=\"comment\"></Textarea>
              <div class=\"call-request__send\">
                <Button dom-name=\"send\">Отправить</Button>
            </div>
        </form>
    ";
})
?>

