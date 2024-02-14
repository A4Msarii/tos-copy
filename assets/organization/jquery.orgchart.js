(function ($) {
  $.fn.orgChart = function (options) {
    var opts = $.extend({}, $.fn.orgChart.defaults, options);
    return new OrgChart($(this), opts);
  };

  $.fn.orgChart.defaults = {
    data: [{ id: 1, name: "Root", parent: 0 }],
    showControls: false,
    allowEdit: false,
    onAddNode: null,
    onDeleteNode: null,
    onClickNode: null,
    newNodeText: "Add Child",
  };

  function OrgChart($container, opts) {
    var data = opts.data;
    var nodes = {};
    var rootNodes = [];
    this.opts = opts;
    this.$container = $container;
    var self = this;

    this.draw = function () {
      $container.empty().append(rootNodes[0].render(opts));
      $container.find(".node").click(function () {
        if (self.opts.onClickNode !== null) {
          self.opts.onClickNode(nodes[$(this).attr("node-id")]);
        }
      });

      if (opts.allowEdit) {
        $container.find(".node h2").click(function (e) {
          var thisId = $(this).parent().attr("node-id");
          self.startEdit(thisId);
          e.stopPropagation();
        });
      }

      $(".depDrop").change(function () {
        var depName1 = $(this).val();
        var depPId = $(this).data("name");
        var depId = $(this).data("id");

        $.ajax({
          type: "POST",
          url: "../../includes/fetchDepOrg.php",
          data: {
            depName1: depName1,
            depPId: depPId,
            depId: depId,
          },
          dataType: "html",
          success: function (response) {
            //   $("#" + cName + " .userDrop").html(response);
            location.reload();
          },
        });
      });
      $(".userDrop").change(function () {
        var depName1 = $(this).val();
        var depPId = $(this).data("name");
        var userId = $(this).data("id");

        $.ajax({
          type: "POST",
          url: "../../includes/fetchDepOrg.php",
          data: {
            userName1: depName1,
            userPId: depPId,
            userId: userId,
          },
          dataType: "html",
          success: function (response) {
            //   $("#" + cName + " .userDrop").html(response);
            location.reload();
          },
        });
      });

      $(".fetchDetail").on("click",function(){
        var userType = $(this).data("name");
        var userId = $(this).data("id");
        if(userType == "user"){
          $.ajax({
            type: "POST",
            url: "../../includes/fetchDepOrg.php",
            data: {
              fetchUser: userId,
              userType : userType
            },
            dataType: "html",
            success: function (response) {
              // alert(response);
              $(".uDetail").empty();
              $(".uDetail").html(response);
            },
          });
        }
        if(userType == "department"){
          $.ajax({
            type: "POST",
            url: "../../includes/fetchDepOrg.php",
            data: {
              fetchDep: userId,
              depType : userType
            },
            dataType: "html",
            success: function (response) {
              // alert(response);
              $(".uDetail").empty();
              $(".uDetail").html(response);
            },
          });
        }
      });

      $(".selectOption").on("click", function () {
        var optValue = $(this).data("value");
        $(".dropdown").removeClass("show");

        var cName = $(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .attr("id");
        if (optValue == "user") {
          $.ajax({
            type: "POST",
            url: "../../includes/fetchDepOrg.php",
            data: {
              userName: optValue,
            },
            dataType: "html",
            success: function (response) {
              $("#" + cName + " .userDrop").html(response);
            },
          });
          $("#" + cName + " .depDrop").css("display", "none");
          $("#" + cName + " .userDrop").css("display", "");
        }

        if (optValue == "departMent") {
          $.ajax({
            type: "POST",
            url: "../../includes/fetchDepOrg.php",
            data: {
              depName: optValue,
            },
            dataType: "html",
            success: function (response) {
              $("#" + cName + " .depDrop").html(response);
            },
          });
          //   location.reload();
          $("#" + cName + " .userDrop").css("display", "none");
          $("#" + cName + " .depDrop").css("display", "");
        }
      });

      // add "add button" listener
      $container.find(".org-add-button").click(function (e) {
        var thisId = $(this).parent().attr("node-id");

        if (self.opts.onAddNode !== null) {
          self.opts.onAddNode(nodes[thisId]);
        } else {
          self.newNode(thisId);
        }
        e.stopPropagation();
      });

      $container.find(".org-del-button").click(function (e) {
        var thisId = $(this).parent().attr("node-id");

        if (self.opts.onDeleteNode !== null) {
          self.opts.onDeleteNode(nodes[thisId]);
        } else {
          self.deleteNode(thisId);
        }
        e.stopPropagation();
      });
    };

    this.startEdit = function (id) {
      var inputElement = $(
        '<input class="org-input" type="text" value="' +
          nodes[id].data.name +
          '"/>'
      );
      $container.find("div[node-id=" + id + "] h2").replaceWith(inputElement);
      var commitChange = function () {
        var h2Element = $(
          '<h2 class="inputName" data-name="' +
            nodes[id].data.name +
            '">' +
            nodes[id].data.name +
            "</h2>"
        );
        if (opts.allowEdit) {
          h2Element.click(function () {
            self.startEdit(id);
          });
        }
        inputElement.replaceWith(h2Element);
      };
      inputElement.focus();
      inputElement.keyup(function (event) {
        if (event.which == 13) {
          commitChange();
        } else {
          nodes[id].data.name = inputElement.val();
        }
      });
      inputElement.blur(function (event) {
        commitChange();
      });
    };

    this.newNode = function (parentId) {
      var nextId = Object.keys(nodes).length;
      while (nextId in nodes) {
        nextId++;
      }

      self.addNode({ id: nextId, name: "", parent: parentId });
    };

    this.addNode = function (data) {
      var newNode = new Node(data);
      nodes[data.id] = newNode;
      nodes[data.parent].addChild(newNode);

      self.draw();
      self.startEdit(data.id);
    };

    this.deleteNode = function (id) {
      for (var i = 0; i < nodes[id].children.length; i++) {
        self.deleteNode(nodes[id].children[i].data.id);
      }
      nodes[nodes[id].data.parent].removeChild(id);
      delete nodes[id];
      self.draw();
    };

    this.getData = function () {
      var outData = [];
      for (var i in nodes) {
        outData.push(nodes[i].data);
      }
      return outData;
    };

    // constructor
    for (var i in data) {
      var node = new Node(data[i]);
      nodes[data[i].id] = node;
    }

    // generate parent child tree
    for (var i in nodes) {
      if (nodes[i].data.parent == 0) {
        rootNodes.push(nodes[i]);
      } else {
        nodes[nodes[i].data.parent].addChild(nodes[i]);
      }
    }

    // draw org chart
    $container.addClass("orgChart");
    self.draw();
  }

  function showDropdown(element) {
    $(element).addClass("show");
    $(element).find(".dropdown-menu").addClass("show");
  }

  function hideDropdown(element) {
    $(element).removeClass("show");
    $(element).find(".dropdown-menu").removeClass("show");
  }

  function Node(data) {
    this.data = data;
    this.children = [];
    var self = this;

    this.addChild = function (childNode) {
      this.children.push(childNode);
    };

    this.removeChild = function (id) {
      for (var i = 0; i < self.children.length; i++) {
        if (self.children[i].data.id == id) {
          self.children.splice(i, 1);
          return;
        }
      }
    };

    this.render = function (opts) {
      var childLength = self.children.length,
        mainTable;

      mainTable = "<table cellpadding='0' cellspacing='0' border='0' id='orgTable'>";
      var nodeColspan = childLength > 0 ? 2 * childLength : 2;
      mainTable +=
        "<tr><td colspan='" +
        nodeColspan +
        "'>" +
        self.formatNode(opts) +
        "</td></tr>";

      if (childLength > 0) {
        var downLineTable =
          "<table cellpadding='0' cellspacing='0' border='0'><tr class='lines x'><td class='line left half'></td><td class='line right half'></td></table>";
        mainTable +=
          "<tr class='lines'><td colspan='" +
          childLength * 2 +
          "'>" +
          downLineTable +
          "</td></tr>";

        var linesCols = "";
        for (var i = 0; i < childLength; i++) {
          if (childLength == 1) {
            linesCols += "<td class='line left half'></td>"; // keep vertical lines aligned if there's only 1 child
          } else if (i == 0) {
            linesCols += "<td class='line left'></td>"; // the first cell doesn't have a line in the top
          } else {
            linesCols += "<td class='line left top'></td>";
          }

          if (childLength == 1) {
            linesCols += "<td class='line right half'></td>";
          } else if (i == childLength - 1) {
            linesCols += "<td class='line right'></td>";
          } else {
            linesCols += "<td class='line right top'></td>";
          }
        }
        mainTable += "<tr class='lines v'>" + linesCols + "</tr>";

        mainTable += "<tr>";
        for (var i in self.children) {
          mainTable +=
            "<td colspan='2'>" + self.children[i].render(opts) + "</td>";
        }
        mainTable += "</tr>";
      }
      mainTable += "</table>";
      return mainTable;
    };

    this.formatNode = function (opts) {
      var nameString = "",
        descString = "";
      nameParent = "";
      selectOpt = "";
      showList = "";
      selectDrop = "";
      selectUser = "";
      if (typeof data.name !== "undefined") {
        nameString =
          '<img style="height:50px;width:50px;margin-left: -5px;" class="avatar-img" src="'+ self.data.img +'" /><h2 class="inputName" data-name="' +
          self.data.name +
          '">' +
          self.data.name +
          "</h2>";
        nameParent =
          "<input class='inputParent' type='hidden' name='inputParent[]' data-parentid='" +
          self.data.parent +
          "' />";
        if(self.data.type == "department"){
          showList =
          '<div class="dropdown dropdown1" style="margin-right:-10px; margin-top:10px;display: inline-block;width:auto;" onclick="showDropdown(this)" onmouseout="hideDropdown(this)"><button type="button" data-name="' +
          self.data.type +
          '" data-id="'+ self.data.mainId +'" style="width: auto;" class="nav-link btn fetchDetail" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="landingsMegaMenu1"><i class="bi bi-eye-fill"></i></button><div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu1" style="width:300px;margin-top:0px;"><div class="navbar-dropdown-menu-promo"><div class="container-fluid"><div class="row uDetail" id=""></div></div></div></div></div>';
        }

        selectOpt =
          '<div class="dropdown dropdown1" style="margin-left: 33px;margin-right:-10px; margin-top:10px;display: inline-block;width:auto;" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)"><button type="button" style="width: auto;" class="nav-link btn btn-soft-primary dropdown-toggle selectDrp" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="landingsMegaMenu1"></button><div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu1" style="margin-top:0px;"><div class="navbar-dropdown-menu-promo"><div class="container-fluid"><div class="row"><span style="margin:15px 0px" class="selectOption" data-value="departMent">Department</span><span style="margin:15px 0px" class="selectOption" data-value="user">Users</span><span style="margin:15px 0px">Others</span></div></div></div></div></div>';
        selectDrop =
          "<select style='display:none;' class='depDrop form form-control' data-name='" +
          self.data.parent +
          "' data-id='" +
          self.data.id +
          "'></select>";
        selectUser =
          "<select style='display:none;' class='userDrop form form-control' data-name='" +
          self.data.parent +
          "' data-id='" +
          self.data.id +
          "'></select>";
      }
      if (typeof data.description !== "undefined") {
        descString = "<p>" + self.data.description + "</p>";
      }
      if (opts.showControls) {
        var buttonsHtml =
          "<div class='org-add-button'>" +
          opts.newNodeText +
          "</div><div class='org-del-button'></div>";
      } else {
        buttonsHtml = "";
      }
      return (
        "<div id='node" +
        this.data.id +
        "' class='node' node-id='" +
        this.data.id +
        "'>" +
        nameString +
        nameParent +
        showList +
        selectOpt +
        selectDrop +
        selectUser +
        descString +
        buttonsHtml +
        "</div>"
      );
    };
  }
})(jQuery);
