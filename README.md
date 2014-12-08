#README 
----------------
1. description
2. requirement
3. installation
4. contact
5. license

#descrption
This is simple tool to make a big map from small pieces, using google map api. Point start point N\E coords, zoom and size of output image. script make few (depends on size of output image) queries, put togheter all images, and give you a link to download final image.

#requirements
software part:<br/>
1. php5 with GDlib (graphic library)<br/>
2. http-server Apache or other web server to run php scripts.<br/><br/>
other requirements:<br/>
1. Google map API key.

#installation
1. Get google basic map api key. 
2. Put key into config.php
3. make some changes in php.ini about execution time and memory limith (90 sec & 512Mb shoud be enouth for final image size of ~12000x7000 pix) 

#contact
razblade@gmail.com

#license
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
