/**
 * Created by Nick on 8/9/14.
 */

function ParentSearchItemViewModel(parentName, phoneObj, email, childrenArray)
{
    var self = this;
    self.parentName = ko.observable(parentName);
    if (phoneObj)
    {
        self.phone = ko.observable(phoneObj.phoneNumber);
        self.phoneCanText = ko.observable(phoneObj.canText ? 'SMS' : '');
    }
    else
    {
        self.phone = ko.observable();
        self.phoneCanText = ko.observable();
    }

    self.email = ko.observable(email);
    self.children = ko.observableArray(childrenArray);
}

function ParentSearchViewModel()
{
    var self = this;
    self.parentSearchQueryResults = ko.observableArray([]);
    self.parentQueryResultsVisible = ko.observable(false);
    self.familyDataAggregates = {};
    self.refineResultMessageVisible = ko.observable(false);
}

ParentSearchUtil =
{
    ParentSearchResultsViewModel : new ParentSearchViewModel(),
    ShowParentResults : function (parentQuery)
    {
        //show the results of the parent query
        $.ajax(
            {
                type: 'POST',
                dataType: 'JSON',
                data: {query: parentQuery},
                url: "./REST/QueryParentByName.php",
                error: function(jqXhm)
                {
                    alert('Something went wrong with the request to the server...');
                },
                success: function (arrResults)
                {
                    ParentSearchUtil.ParentSearchResultsViewModel.parentSearchQueryResults.removeAll();
                    if (arrResults.length > 1)
                    {

                    }
                    else if (arrResults.length)
                    {
                        ParentSearchUtil.ParentSearchResultsViewModel.parentQueryResultsVisible(true);

                        var parentQueryResultObj = new ParentSearchItemViewModel();
                        parentQueryResultObj.parentName(arrResults[0].firstName + ' ' + arrResults[0].lastName);
                        parentQueryResultObj.parentContact('Phone Number: ' +  arrResults[0].phoneNumber);
                        ParentSearchUtil.ParentSearchResultsViewModel.parentSearchQueryResults(parentQueryResultObj);
                    }
                    //else no results, shouldn't be at this point
                }
            });
    },
    ParentNameSearchAutoComplete : function(textBoxId)
    {
        $(textBoxId).keyup(function (){
            var val =  $(textBoxId).val().toUpperCase();
            ParentSearchUtil.ParentSearchResultsViewModel.refineResultMessageVisible(false);
            ParentSearchUtil.ParentSearchResultsViewModel.parentSearchQueryResults.removeAll();

            if (!val) return;
            var addedAny = false;
            ParentSearchUtil.ParentSearchResultsViewModel.parentSearchQueryResultsCount = 0;
            var ctr = 0;
            $.each(ParentSearchUtil.ParentSearchResultsViewModel.familyDataAggregates, function(iter, item){
                if (ctr > 5) return;
                if (item.searchName.toUpperCase().indexOf(val) > -1)
                {
                    ParentSearchUtil.ParentSearchResultsViewModel.parentSearchQueryResults.push(new ParentSearchItemViewModel(item.searchName,
                        item.parentPhoneContacts ? item.parentPhoneContacts[0] : '',
                        item.emailAddresses ? item.emailAddresses[0] : '',
                        item.children));
                    ctr++;
                }
            });

            ParentSearchUtil.ParentSearchResultsViewModel.refineResultMessageVisible(ctr > 5);
            ParentSearchUtil.ParentSearchResultsViewModel.parentQueryResultsVisible(ctr > 0);

        });
    },
    SearchParent : function(query)
    {
        $.ajax(
            {
                type: 'POST',
                dataType: 'JSON',
                data: {query: query},
                url: "QueryParentNames.php",
                success: function (obj)
                {
                    alert(obj);
                    FamilyUtil.SetFamilySearchResults(obj);
                }
            });
    },
    LoadData : function(callback)
    {
        $.ajax(
            {
                type: 'POST',
                dataType: 'JSON',
                url: './REST/AllParentsAndChildrenGET.php',
                success: function (arrObjs)
                {
                    ParentSearchUtil.ParentSearchResultsViewModel.familyDataAggregates = arrObjs;
                    if (callback)
                    {
                        callback();
                    }
                }
            });

    }
}
