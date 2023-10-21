<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* author/list.html.twig */
class __TwigTemplate_a1c9b8614c658851fac1d1da1fb16c7e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "author/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "author/list.html.twig"));

        // line 1
        if ((array_key_exists("authors", $context) && (twig_length_filter($this->env, (isset($context["authors"]) || array_key_exists("authors", $context) ? $context["authors"] : (function () { throw new RuntimeError('Variable "authors" does not exist.', 1, $this->source); })())) > 0))) {
            // line 2
            echo "<p> NB_author : ";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["authors"]) || array_key_exists("authors", $context) ? $context["authors"] : (function () { throw new RuntimeError('Variable "authors" does not exist.', 2, $this->source); })())), "html", null, true);
            echo " </p>
";
            // line 3
            $context["total_books"] = 0;
            // line 4
            echo "<table border='1'>

<th> id </th>
<th> picture </th>
<th> username </th>
<th> email </th>
<th> nb_books </th>
<th> Details </th>


";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["authors"]) || array_key_exists("authors", $context) ? $context["authors"] : (function () { throw new RuntimeError('Variable "authors" does not exist.', 14, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
                // line 15
                echo "
<tr>
<td>
";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["author"], "id", [], "any", false, false, false, 18), "html", null, true);
                echo "
</td>
<td>
<img src = \"";
                // line 21
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, $context["author"], "picture", [], "any", false, false, false, 21)), "html", null, true);
                echo " \" witdh =\"150\" height=\"120\">
</td>
<td>
";
                // line 24
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["author"], "username", [], "any", false, false, false, 24)), "html", null, true);
                echo "
</td>
<td>
";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["author"], "email", [], "any", false, false, false, 27), "html", null, true);
                echo "
</td>
<td>
";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["author"], "nb_books", [], "any", false, false, false, 30), "html", null, true);
                echo "
";
                // line 31
                $context["total_books"] = (twig_get_attribute($this->env, $this->source, $context["author"], "nb_books", [], "any", false, false, false, 31) + (isset($context["total_books"]) || array_key_exists("total_books", $context) ? $context["total_books"] : (function () { throw new RuntimeError('Variable "total_books" does not exist.', 31, $this->source); })()));
                // line 32
                echo "</td>
<td>
<a href = \"";
                // line 34
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_author_details", ["id" => twig_get_attribute($this->env, $this->source, $context["author"], "id", [], "any", false, false, false, 34)]), "html", null, true);
                echo "\"> Details </a>
</td>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "</tr>
</table>
";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["total_books"]) || array_key_exists("total_books", $context) ? $context["total_books"] : (function () { throw new RuntimeError('Variable "total_books" does not exist.', 39, $this->source); })()), "html", null, true);
            echo "
";
        } else {
            // line 41
            echo "<h1> le tableau est vide </h1>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "author/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 41,  120 => 39,  116 => 37,  107 => 34,  103 => 32,  101 => 31,  97 => 30,  91 => 27,  85 => 24,  79 => 21,  73 => 18,  68 => 15,  64 => 14,  52 => 4,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if authors is defined and authors|length >0 %}
<p> NB_author : {{authors|length}} </p>
{% set total_books = 0    %}
<table border='1'>

<th> id </th>
<th> picture </th>
<th> username </th>
<th> email </th>
<th> nb_books </th>
<th> Details </th>


{% for author in authors %}

<tr>
<td>
{{author.id}}
</td>
<td>
<img src = \"{{asset(author.picture)}} \" witdh =\"150\" height=\"120\">
</td>
<td>
{{author.username | upper}}
</td>
<td>
{{author.email}}
</td>
<td>
{{author.nb_books}}
{% set total_books = author.nb_books + total_books %}
</td>
<td>
<a href = \"{{path('app_author_details',{id: author.id})}}\"> Details </a>
</td>
{% endfor %}
</tr>
</table>
{{total_books}}
{% else %}
<h1> le tableau est vide </h1>
{% endif %}", "author/list.html.twig", "C:\\composer\\FirstProject\\templates\\author\\list.html.twig");
    }
}
