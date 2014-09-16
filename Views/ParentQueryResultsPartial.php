<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/8/14
 * Time: 11:17 PM
 */

namespace Views;

use \Interfaces\IRenderBodyContent;

class ParentQueryResultsPartial implements IRenderBodyContent
{
    public function RenderBodyContent()
    {
        ?>
        <div class="container" id="divParentQueryResultsView" data-bind="style : { 'display' : parentQueryResultsVisible() ? 'block' : 'none'}">
            <div class="row">
                <div class="col-xs-12" data-bind="foreach: parentSearchQueryResults">
                    <div class="well">
                        <h4 data-bind="text: parentName">
                        </h4>
                        <p style="font-size: 10pt; font-family: Calibri">
                            <span data-bind="text: phone"></span>
                            <span data-bind="text: phoneCanText"></span>
                        </p>
                        <p style="font-size: 10pt; font-family: Calibri">
                            <a data-bind="attr { href: 'mailto:' + email() }">
                                <span data-bind="text: email()"></span>
                            </a>
                        </p>
                        <div style="height: 30px;">
                            <button class="btn btn-info" style="float: right; margin-right: 5px;">
                                Check In
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="text-danger" data-bind="visible: refineResultMessageVisible">Too many results to display, please refine search query...</span>
        <div class="modal fade" id="parentCheckinModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="checkInParentModalTitle">Check in {parent}</h4>
                    </div>
                    <div class="modal-body">
                        <table>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script src="./js/Family/Parent/ParentSearch.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                ParentSearchUtil.LoadData(ParentSearchUtil.ParentNameSearchAutoComplete('#txtSearch'));

                ko.applyBindings(ParentSearchUtil.ParentSearchResultsViewModel);
            });
        </script>
    <?php
    }
}