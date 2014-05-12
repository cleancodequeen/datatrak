<?php

/* project_meta.html */
class __TwigTemplate_752f18b0d64ceb75c96d0f5237750a52 extends Twig_Template
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
        echo "<input type=\"hidden\" name=\"project_meta_nonce\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["project_meta_nonce"]) ? $context["project_meta_nonce"] : null), "html", null, true);
        echo "\" />

<table class=\"form-table\">
    <tr>
        <th style=''><label for='Project Status'>Project Status *</label></th>
        <td>
            <select class='widefat' name=\"sel_project_status\" id=\"sel_project_status\">
                <option ";
        // line 8
        if (((isset($context["project_status"]) ? $context["project_status"] : null) == 0)) {
            echo "selected";
        }
        echo " value=\"0\">Select</option>
                <option ";
        // line 9
        if (((isset($context["project_status"]) ? $context["project_status"] : null) == "planned")) {
            echo "selected";
        }
        echo " value=\"planned\">Planned</option>
                <option ";
        // line 10
        if (((isset($context["project_status"]) ? $context["project_status"] : null) == "pending")) {
            echo "selected";
        }
        echo " value=\"pending\">Pending</option>
                <option ";
        // line 11
        if (((isset($context["project_status"]) ? $context["project_status"] : null) == "failed")) {
            echo "selected";
        }
        echo " value=\"failed\">Failed</option>
                <option ";
        // line 12
        if (((isset($context["project_status"]) ? $context["project_status"] : null) == "completed")) {
            echo "selected";
        }
        echo " value=\"completed\">Completed</option>
            </select>
        </td>
    </tr>
    <tr>
        <th style=''><label for='Project Duration'>Project Duration *</label></th>
        <td><input class='widefat' name='txt_duration' id='txt_duration' type='text' value='";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["project_duration"]) ? $context["project_duration"] : null), "html", null, true);
        echo "' /></td>
    </tr>
    <tr>
        <th style=''><label for='Project URL'>Project URL</label></th>
        <td>
            
            <input class='widefat' name='txt_url' id='txt_url' type='text' value='";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["project_url"]) ? $context["project_url"] : null), "html", null, true);
        echo "'  /></td>
    </tr>    
    <tr>
        <th style=''><label for='Download URL'>Download URL</label></th>
        <td><input class='widefat' name='txt_download_url' id='txt_download_url' type='text'  value='";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["project_download_url"]) ? $context["project_download_url"] : null), "html", null, true);
        echo "' /></td>
    </tr>
    <tr>
        <th style=''><label for='Project Screens'>Project Screens</label></th>
        <td><input class='widefat wpwa_multi_file' type=\"file\" id=\"project_screens\"  />
            <div class='wpwa_preview_box' id='project_screens_panel' >
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["project_screens"]) ? $context["project_screens"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 35
            echo "                <img class='wpwa_img_prev' style='with:75px;height:75px' src='";
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "' />
                <input class='wpwa_img_prev_hidden' type='hidden' name='h_project_screens[]' value='";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "' />
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "            </div>
        </td>
    </tr>
    
</table>
";
    }

    public function getTemplateName()
    {
        return "project_meta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 38,  99 => 36,  94 => 35,  90 => 34,  81 => 28,  74 => 24,  65 => 18,  54 => 12,  48 => 11,  42 => 10,  36 => 9,  30 => 8,  19 => 1,);
    }
}
