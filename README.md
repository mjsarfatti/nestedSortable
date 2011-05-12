# nestedSortable jQuery plugin

*nestedSortable* is a jQuery plugin that extends jQuery Sortable UI functionalities to nested lists.

## Features

- Designed to work seamlessly with the [nested](http://articles.sitepoint.com/article/hierarchical-data-database "A Sitepoint tutorial on PHP, MYSQL and nested sets") [set](http://en.wikipedia.org/wiki/Nested_set_model "Wikipedia article on nested sets") model (have a look at the `toArray` method)
- Items can be sorted in their own list, moved across the tree, or nested under other items.
- Sublists are created and deleted on the fly
- All jQuery Sortable options, events and methods are available
- It is possible to define elements that will not accept a new nested item/list
- It is possible to define a maximum depth for nested items

## Usage

```
<ol class="sortable">
	<li><div>Some content</div></li>
	<li>
		<div>Some content</div>
		<ol>
			<li><div>Some sub-item content</div></li>
			<li><div>Some sub-item content</div></li>
		</ol>
	</li>
	<li><div>Some content</div></li>
</ol>
```

Please note: every `<li>` must have either one or two direct children, the first one being a container element (such as `<div>` in the above example), and the (optional) second one being the nested list. The container element has to be set as the 'toleranceElement' in the options, and this, or one of its children, as the 'handle'.

## Custom Options

<dl>
	<dt>tabSize</dt>
	<dd>How far right or left (in pixels) the item has to travel in order to be nested or to be sent outside its current list. Default: **20**</dd>
	<dt>disableNesting </dt>
	<dd>The class name of the items that will not accept nested lists. Default: **ui-nestedSortable-no-nesting**</dd>
	<dt>errorClass </dt>
	<dd>The class given to the placeholder in case of error. Default: **ui-nestedSortable-error**</dd> 
	<dt>listType </dt>
	<dd>The list type used (ordered or unordered). Default: **ol**</dd>
	<dt>maxLevels </dt>
	<dd>The maximum depth of nested items the list can accept. If set to '0' the levels are unlimited. Default: **0**</dd>
</dl>

## Custom Methods

<dl>
	<dt>serialize</dt>
	<dd>Serializes the nested list into a string like **setName[item1Id]=parentId&setName[item2Id]=parentId**, reading from each item's id formatted as 'setName_itemId' (where itemId is a number).
	It accepts the same options as the original Sortable method (**key**, **attribute** and **expression**).</dd>
	<dt>toArray</dt>
	<dd>Builds an array where each element is in the form:
```
setName[n] =>
{
	'item_id': itemId,
	'parent_id': parentId,
	'depth': depth,
	'left': left,
	'right': right,
}
```
	It accepts the same options as the original Sortable method (**attribute** and **expression**) plus the custom ** startDepthCount**, that sets the starting depth number (default is **0**).</dd>
	<dt>toHierarchy</dt>
	<dd>Builds a hierarchical object in the form:
```
'0' ...
	'id' => itemId
'1' ...
	'id' => itemId
	'children' ...
		'0' ...
			'id' => itemId
		'1' ...
			'id' => itemId
'2' ...
	'id' => itemId
```
	Similarly to `toArray`, it accepts **attribute** and **expression** options.</dd>
</dl>

## Known Bugs

*nestedSortable* doesn't work properly with connected draggables, because of the way Draggable simulates Sortable `mouseStart` and `mouseStop` events. This bug might or might not be fixed some time in the future (it's not specific to this plugin).

## Requirements

jQuery 1.4+
jQuery UI Sortable 1.8+

## Browser Compatibility

Tested with: IE 6/7/8, Firefox 3.6/4, Chrome, Safari 3

# License

This work is licensed under a Creative Commons Attribution-ShareAlike 3.0 Unported License.

This work is *pizzaware*. If it saved your life, or you just feel good at heart, please consider offering me a pizza. This can be done in two ways: (1) use the Paypal button at the bottom of the project's [home page](http://mjsarfatti.com/sandbox/nestedSortable); (2) send me cash via traditional mail to my home address in Italy. Is the second method legal? It is in Italy if you use Posta assicurata. You should check with your local laws if you live elsewhere.
	