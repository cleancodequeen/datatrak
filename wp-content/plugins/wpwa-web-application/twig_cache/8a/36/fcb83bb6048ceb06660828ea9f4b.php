<?php

/* service_meta.html */
class __TwigTemplate_8a36fcb83bb6048ceb06660828ea9f4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<input type=\"hidden\" name=\"service_meta_nonce\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["service_meta_nonce"]) ? $context["service_meta_nonce"] : null), "html", null, true);
        echo "\" />

<table class=\"form-table\">
<tr>
        <th style=''><label for='Service availability'>Service availability *</label></th>
        <td>
            <select class='widefat' name=\"service_availability\" id=\"service_availability\">
                <option ";
        // line 8
        if (((isset($context["service_availability"]) ? $context["service_availability"] : null) == 0)) {
            echo "selected";
        }
        echo " value=\"0\">Select</option>
                <option ";
        // line 9
        if (((isset($context["service_availability"]) ? $context["service_availability"] : null) == "av")) {
            echo "selected";
        }
        echo " value=\"av\">Available</option>
                <option ";
        // line 10
        if (((isset($context["service_availability"]) ? $context["service_availability"] : null) == "nav")) {
            echo "selected";
        }
        echo " value=\"nav\">Not available</option>
            </select>
        </td>
    </tr>
    <tr>
        <th style=''><label for='Service Price Type'>Service Prize Type </label></th>
        <td>
            <select class='widefat' name=\"service_price_type\" id=\"service_price_type\">
                <option ";
        // line 18
        if (((isset($context["service_price_type"]) ? $context["service_price_type"] : null) == 0)) {
            echo "selected";
        }
        echo " value=\"0\">Select</option>
                <option ";
        // line 19
        if (((isset($context["service_price_type"]) ? $context["service_price_type"] : null) == "hourly")) {
            echo "selected";
        }
        echo " value=\"hourly\">Hourly</option>
                <option ";
        // line 20
        if (((isset($context["service_price_type"]) ? $context["service_price_type"] : null) == "fixed")) {
            echo "selected";
        }
        echo " value=\"fixed\">Fixed</option>
            </select>
        </td>
    </tr>
    <tr>
        <th style=''><label for='Price'>Price </label></th>
        <td><input class='widefat' name='service_price_value' id='service_price_value' type='text' value='";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["service_price_value"]) ? $context["service_price_value"] : null), "html", null, true);
        echo "' /></td>
    </tr>
    
    
</table>
";
    }

    public function getTemplateName()
    {
        return "service_meta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 26,  67 => 20,  61 => 19,  55 => 18,  42 => 10,  36 => 9,  30 => 8,  19 => 1,);
    }
}
