# Description

Simple functionality plugin that thru shortcodes allows you to show which ages bellongs in which groups.

Agegroups in danish swimming changes once every year so this little plugin simply automatically changes which ages bellongs in which groups so I don't have to update manually.

# Examples

It can be seen in action here [http://www.svommeklubbennord.dk/konkurrenceafdeling/klubrekorder/](http://www.svommeklubbennord.dk/konkurrenceafdeling/klubrekorder/) and on it's subpages

# Usage

The shortcode to insert looks like this:
> [agegroup group=junior gender=female]

options:
	group=aargang2 - choices: 'aargang2', 'aargang1', 'junior' or 'senior'
	gender=female - choices: 'female' or 'male'



Redcarpet 2 is written with sugar, spice and everything nice
============================================================

Redcarpet is Ruby library for Markdown processing that smells like
butterflies and popcorn.

Redcarpet used to be a drop-in replacement for Redcloth. This is no longer the
case since version 2 -- it now has its own API, but retains the old name. Yes,
that does mean that Redcarpet 2 is not backwards-compatible with the 1.X
versions.

Redcarpet is powered by the Sundown library, which can be found at

    https://www.github.com/tanoku/sundown

The Redcarpet source (including Sundown as a submodule) is available at GitHub:

    $ git clone git://github.com/tanoku/redcarpet.git

And it's like *really* simple to use
------------------------------------

The core of the Redcarpet library is the `Redcarpet::Markdown` class. Each
instance of the class is attached to a `Renderer` object; the Markdown class
performs parsing of a document and uses the attached renderer to generate
output.

The `Markdown` object is encouraged to be instantiated once with the required
settings, and reused between parses.

    Markdown.new(renderer, extensions={})

    Initializes a Markdown parser

    renderer -  a renderer object, inheriting from Redcarpet::Render::Base.
                If the given object has not been instantiated, the library
                will do it with default arguments.

    extensions - a hash containing the Markdown extensions which the parser
                will identify. The following extensions are accepted:

                :no_intra_emphasis - do not parse emphasis inside of words.
                    Strings such as `foo_bar_baz` will not generate `<em>`
                    tags.

                :tables - parse tables, PHP-Markdown style

                :fenced_code_blocks - parse fenced code blocks, PHP-Markdown
                    style. Blocks delimited with 3 or more `~` or backticks
                    will be considered as code, without the need to be
                    indented. An optional language name may be added at the
                    end of the opening fence for the code block

                :autolink - parse links even when they are not enclosed in
                    `<>` characters. Autolinks for the http, https and ftp
                    protocols will be automatically detected. Email addresses
                    are also handled, and http links without protocol, but
                    starting with `www.`

                :strikethrough - parse strikethrough, PHP-Markdown style
                    Two `~` characters mark the start of a strikethrough,
                    e.g. `this is ~~good~~ bad`

                :lax_html_blocks - HTML blocks do not require to be surrounded
                    by an empty line as in the Markdown standard.

                :space_after_headers - A space is always required between the
                    hash at the beginning of a header and its name, e.g.
                    `#this is my header` would not be a valid header.

                :superscript - parse superscripts after the `^` character;
                    contiguous superscripts are nested together, and complex
                    values can be enclosed in parenthesis,
                    e.g. `this is the 2^(nd) time`

    Example:

        markdown = Redcarpet::Markdown.new(Redcarpet::Render::HTML,
            :autolink => true, :space_after_headers => true)

Rendering with the `Markdown` object is done through `Markdown#render`.
Unlike in the RedCloth API, the text to render is passed as an argument
and not stored inside the `Markdown` instance, to encourage reusability.

~~~~~ ruby
# create a custom renderer that allows highlighting of code blocks
class HTMLwithAlbino < Redcarpet::Render::HTML
  def block_code(code, language)
    Albino.safe_colorize(code, language)
  end
end

markdown = Redcarpet::Markdown.new(HTMLwithAlbino, :fenced_code_blocks => true)
~~~~~

But new renderers can also be created from scratch (see `lib/render_man.rb` for
an example implementation of a Manpage renderer)

~~~~~~ ruby
class ManPage < Redcarpet::Render::Base
    # you get the drill -- keep going from here
end
~~~~~

# Standalone
Redcarpet::Render::SmartyPants.render("<p>Oh SmartyPants, you're so crazy...</p>")
~~~~~

SmartyPants works on top of already-rendered HTML, and will ignore replacements
inside the content of HTML tags and inside specific HTML blocks such as 
`<code>` or `<pre>`.