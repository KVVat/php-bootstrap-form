<?php
class ErrorView_Standard extends ErrorView {
    public function applyAjaxErrorResponse() {
        $id = $this->_form->getAttribute("id");
        echo <<<JS
        var errorSize = response.errors.length;
        if(errorSize == 1)
            var errorFormat = "エラーが";
        else
            var errorFormat = errorSize + "個のエラーが";

        $('.alert-danger').hide();
        var errorHTML = '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a><strong class="alert-heading"> ' + errorFormat + ' 見つかりました:</strong><ul>';
        for(e = 0; e < errorSize; ++e)
            errorHTML += '<li>' + response.errors[e] + '</li>';
        errorHTML += '</ul></div>';
        jQuery("#$id").prepend(errorHTML);
JS;

    }

    private function parse($errors) {
        $list = array();
        if(!empty($errors)) {
            $keys = array_keys($errors);
            $keySize = sizeof($keys);
            for($k = 0; $k < $keySize; ++$k)
                $list = array_merge($list, $errors[$keys[$k]]);
        }
        return $list;
    }

    public function render() {
        $errors = $this->parse($this->_form->getErrors());
        if(!empty($errors)) {
            $size = sizeof($errors);
            $errors = implode("</li><li>", $errors);

            if($size == 1)
                $format = "エラーが";
            else
                $format = $size . "個のエラーが";

            echo <<<HTML
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <strong class="alert-heading">$format 見つかりました:</strong>
                <ul><li>$errors</li></ul>
            </div>
HTML;
        }
    }

    public function renderAjaxErrorResponse() {
        $errors = $this->parse($this->_form->getErrors());
        if(!empty($errors)) {
            header("Content-type: application/json");
            echo json_encode(array("errors" => $errors));
        }
    }
}
