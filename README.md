# statamic-pi-listpages

The plugin is designed to work within the [Statamic](http://www.statamic.com) `entries:pagination` tag-pair, and provides a list of `<li><a>` items for each page that can be used to replace the standard `Prev | Next` links with something along the lines `< | 1 | 2 | 3 | 4 | 5 | >`.

[Statamic](http://statamic.com) is an awesome flat-file CMS for website and blogs - you should definately check it out if you don't know what it is already.

## Installation

Copy the folder `listpages` into you statamic `_add-ons` folder.

## Usage

Within your `entries:pagination` tag-pair include the `{{ listpages }}` tag.
This takes the following parameters:
- `current_page`
- `total_pages`
- `pages_to_show`

These are best set as follows:
- `current_page="{current_page}"` (so that it knows the current page according to `entries:pagination`)
- `total_pages="{total_pages}"` (so that it knows the total pages according to `entries:pagination`)
- `pages_to_show="5"` (or another odd number, although even numbers will also work)

The plugin will shift the numbers such that the current page is in the centre of the list of pages, except of course for first and last couple of pages.

## Example Usage

    {{# statamic pagination - as per normal usage, details must match the entries:listing this is designed to work with #}}
    {{ entries:pagination
      folder="{fold}"
      limit="{lim}"
      taxonomy="{tax}"
    }}
    
      {{ if total_pages > 1 }}
    
      <div>
        <ul class="pagination">
        
        {{ if previous_page }}
          <li><a href="{{ previous_page }}">Prev</span></a></li>
        {{ else }}
          <li class="disabled"><span>Prev</span></li>
        {{ endif }}
    
        {{# this is where the pi.listpages.php code is used #}}
        {{ listpages current_page="{current_page}" total_pages="{total_pages}" pages_to_show="5" }}
      
        {{ if next_page }}
          <li><a href="{{ next_page }}">Next</a></li>
        {{ else }}
          <li class="disabled"><span>Next</span></li>
        {{ endif }}
        
        </ul>
      </div><!-- END .pagination -->
    
      {{ endif }}
    
    {{ /entries:pagination }}

### Example Output

The above code would output something like the following, assuming we're on page 2 and there are 5 or more pages.

    <div>
      <ul class="pagination">
        <li class="disabled"><span>Prev</span></li>
        <li><a href="/blog?page=1">1</a></li>
        <li class="active"><a href="/blog?page=2">2</a></li>
        <li><a href="/blog?page=3">3</a></li>
        <li><a href="/blog?page=4">4</a></li>
        <li><a href="/blog?page=5">5</a></li>
        <li><a href="/blog?page=3">Next</a></li>
      </ul>
    </div>/!-- END .pagination -->
    
# Licence

This code is provided 'as is' without any warranty of any kind, express or implied. Use it, copy it, change it, or don't... Do with it as you will entirely at your own risk. I have *not* tested this thoroughly - if you want to use this, then that's up to you!

However please feel free to leave a comment if you found this useful, fork it, or submit improvements via a pull-request. That would be great.
