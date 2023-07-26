window.Harp = {}
BABYLON.OBJFileLoader.OPTIMIZE_WITH_UV = true
BABYLON.OBJFileLoader.SKIP_MATERIALS = true
BABYLON.ArcRotateCamera.prototype.spinTo = function (whichprop, targetval, speed) {
  var ease = new BABYLON.CubicEase()
  ease.setEasingMode(BABYLON.EasingFunction.EASINGMODE_EASEINOUT)
  BABYLON.Animation.CreateAndStartAnimation('at4', this, whichprop, speed, 120, this[whichprop], targetval, 0, ease)
}

window.addEventListener('DOMContentLoaded', () => {

  const canvas = document.getElementById('renderCanvas')
  const loadEvent = new CustomEvent('configurator_loaded', {
    bubbles: true,
    cancelable: true
  })

  const loader = document.createElement('div')
  function removeLoader() {
    // Remove the #loader element from the DOM
    loader.remove();
  }

// Add an event listener for the 'transitionend' event
  loader.addEventListener('transitionend', removeLoader, { once: true });

  loader.setAttribute('id', 'loader')
  let dots = window.setInterval( function() {
    if ( loader.innerHTML.length > 2 )
      loader.innerHTML = "";
    else
      loader.innerHTML += ".";
  }, 500);

  canvas.before(loader)


  const engine = new BABYLON.Engine(canvas, true, {
    preserveDrawingBuffer: true,
    stencil: true
  });

  const createScene = function () {
    const scene = new BABYLON.Scene(engine)
    scene.useRightHandedSystem = true

    //Material Groups **********
    Harp.materialGroups.forEach(function (group) {
      Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
      Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)
    })

    //Finish Groups **********
    Harp.finishGroups.forEach(function (group) {
      Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
      Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)
    })

    //Camera **********
    Harp.camera = new BABYLON.ArcRotateCamera('camera',
      BABYLON.Tools.ToRadians(60),
      BABYLON.Tools.ToRadians(80),
      260,
      new BABYLON.Vector3(0,52,0)
    )
    Harp.camera.zoomToMouseLocation = true
    Harp.camera.useNaturalPinchZoom = true
    Harp.camera.upperBetaLimit = Math.PI / 2
    Harp.camera.upperRadiusLimit = 800
    Harp.camera.lowerRadiusLimit = 12
    Harp.camera.angularSensibilityX = 5000
    Harp.camera.angularSensibilityY = 5000
    Harp.camera.spinTo('beta', 90, 100)
    Harp.camera.attachControl(canvas, true)
    if(Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1) {
      Harp.camera.inputs.remove(Harp.camera.inputs.attached.mousewheel)
    }

    var pipeline = new BABYLON.DefaultRenderingPipeline(
      "defaultPipeline",
      true,
      scene,
      [Harp.camera]
    );
    pipeline.samples = 8;
    pipeline.imageProcessingEnabled = true;
    pipeline.fxaaEnabled = true;
    pipeline.grainEnabled = true;
    pipeline.grain.intensity = 5;
    pipeline.bloomEnabled = true;
    pipeline.bloomThreshold = 0.8;
    pipeline.bloomWeight = 0.25;
    pipeline.bloomKernel = 16;
    pipeline.bloomScale = 0.5;

    //Lighting **********
    const ambient = new BABYLON.HemisphericLight('ambient', new BABYLON.Vector3(0, 1, 0), scene)
    ambient.diffuse = new BABYLON.Color3(0.8 , 0.8, 0.8)
    ambient.specular = new BABYLON.Color3(0.8 , 0.8, 0.8)
    ambient.groundColor = new BABYLON.Color3(1 , 1, 1)
    ambient.intensity = 1


    const sun = new BABYLON.DirectionalLight('sun', new BABYLON.Vector3(-1, -2, -1), scene)
    sun.position = new BABYLON.Vector3(40, 350, 40)
    sun.specular = new BABYLON.Color3(0, 0, 0)
    sun.intensity = 1
    sun.bloomEnabled = 0.5

    Harp.shadowGenerator = new BABYLON.ShadowGenerator(1024, sun)
    Harp.shadowGenerator.darkness = 0
    Harp.shadowGenerator.useBlurCloseExponentialShadowMap = true
    Harp.shadowGenerator.useBlurExponentialShadowMap = true
    Harp.shadowGenerator.useKernelBlur = true
    Harp.shadowGenerator.bias = 0.0001
    Harp.shadowGenerator.blurKernel = 36

    Harp.createFoundation = function () {
      // Create the floor using BABYLON.MeshBuilder.CreateBox
      var worldFloor = BABYLON.MeshBuilder.CreateBox("worldFloor", { width: 5000, depth: 5000, height: 1 }, scene);
      worldFloor.position = new BABYLON.Vector3(0, 0, 0); // Center the floor at 0, 0, 0

      // Create a light gray material for the floor
      var worldFloorMaterial = new BABYLON.StandardMaterial("worldFloorMaterial", scene);
      worldFloorMaterial.diffuseColor = new BABYLON.Color3(0.9, 0.9, 0.9); // Light gray
      worldFloorMaterial.specularColor = new BABYLON.Color3(0, 0, 0); // Specular settings
      worldFloor.material = worldFloorMaterial;

      // Set the worldFloor to receive shadows
      worldFloor.receiveShadows = true;
    }

    //Screenshot tool *********
    Harp.pushScreenshot = async function() {
      Harp.screenshotData = { config_uid: Harp.config.config_uid || null }
      const response = fetch('/api/screenshot', {
        method: 'POST',
        body: JSON.stringify(Harp.screenshotData),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      return true
    }


    //Default routine  **********
    Harp.useRecipe = function () {
      let l,d
      Harp.config = {}
      Harp.config.product = window.recipe.model
      Harp.config.size = window.recipe.size
      Harp.config.area = window.recipe.length * window.recipe.depth
      Harp.config.length = l = window.recipe.length
      Harp.config.depth = d = window.recipe.depth
      Harp.config.endcut = window.recipe.endcut

      if (Harp.productContainer) {
        Harp.productContainer.dispose()
      } else {
        Harp.productContainer = new BABYLON.AssetContainer(scene)
      }


      BABYLON.SceneLoader.ImportMesh('', 'https://bigtimber-dev.bypboh.com/assets/obj/', Harp.config.product + '-' + Harp.config.size + '-' + Harp.config.endcut + '.obj', scene, function (newMeshes) {
      //BABYLON.SceneLoader.ImportMesh('', '/assets/obj/', Harp.config.product + '-' + Harp.config.size + '-' + Harp.config.endcut + '.obj', scene, function (newMeshes) {
        let min = new BABYLON.Vector3(Number.MAX_VALUE, Number.MAX_VALUE, Number.MAX_VALUE);
        let max = new BABYLON.Vector3(-Number.MAX_VALUE, -Number.MAX_VALUE, -Number.MAX_VALUE);

        newMeshes.forEach(mesh => {
          let boundingInfo = mesh.getBoundingInfo();
          min = BABYLON.Vector3.Minimize(min, boundingInfo.minimum);
          max = BABYLON.Vector3.Maximize(max, boundingInfo.maximum);
        });

        // Calculate the model's height
        let height = max.y - min.y;

        newMeshes.forEach(function (m){
            //console.log(m.name)
            m.receiveShadows = false

            if (m.name.includes('hardware')) {
              m.parent = Harp['hardware']
              m.material = Harp['hardware' + '_material']
            } else if (m.name.includes('galvalume')) {
              m.parent = Harp['galvalume']
              m.material = Harp['galvalume' + '_material']
            } else if (m.name.includes('roof')) {
              if (m.name.includes('shingles')) {
                m.parent = Harp['shingles']
                m.material = Harp['shingles' + '_material']
              } else {
                m.parent = Harp['roof']
                m.material = Harp['roof' + '_material']
                m.receiveShadows = true
              }
            } else {
              m.parent = Harp['timber']
              m.material = Harp['timber' + '_material']
              m.receiveShadows = true
            }

          //option groups
          if (m.name.includes('swing')) {
            m.parent = Harp['pine-swing']

          } else if (m.name.includes('posttable')) {
            m.parent = Harp['post-table']

          } else if (m.name.includes('bartop')) {
            m.parent = Harp['wood-bar-top']

          } else if (m.name.includes('slatwall')) {
            m.parent = Harp['lattice-screen']

          }



            m.enableEdgesRendering();
            m.edgesWidth = 16;
            m.edgesColor =  new BABYLON.Color4(8 / 255, 8 / 255, 8 / 255, 1)

            Harp.productContainer.meshes.push(m)

            Harp.shadowGenerator.getShadowMap().renderList.push(m);

            //obj models should be centered on 0,0,0 when export from sketchup
            m.position.z = 0
            m.position.y += height / 2;
            m.position.x = 0
          })
        })


        //shinglesTexture.uScale = shinglesTexture.vScale = 0.02
        //if the model is saratoga use a larger scale
        let shinglesTexture = new BABYLON.Texture(Harp.textures['shingle-driftwood'])
        if (Harp.config.product === 'saratoga') {
          shinglesTexture.uScale = shinglesTexture.vScale = 0.8
        } else {
          shinglesTexture.wAng = Math.PI/2
          shinglesTexture.uScale = shinglesTexture.vScale = 0.02
        }
        Harp.shingles_material.diffuseTexture = shinglesTexture

    }


    let configdata
    Harp.createFoundation()
    Harp.loadDefaultRecipe()

    return scene
  }
  let recipe
  let idx
  const Harp = {
    roofVisible: true,
    sides: ['front', 'back', 'left', 'right'],
    config: {},
    configItems: [],
    configCosts: [],
    panelWidthMap: {},
    sgFauxMap: {},
    ptFauxMap: {
    },
    retail: {
    },
    bomCodes: {
    },
    frontElevationCodes: {
    },
    backElevationCodes: {
    },
    labels: {
      'unfinished-eaves': 'Unfinished',
      'natural-stain': 'Natural Stain',
      'charwood-stain': 'Charwood Stain',
      'factory-primed-white': 'Factory Primed White',
    },
    colors: {
      'pink': 'rgb(255, 20, 255)',
      'studio-shed-bronze': 'rgb(32, 26, 24)',
      'ebony': 'rgb(32, 32, 33)',
      'pebble-gray': 'rgb(140, 130, 110)',
      'unfinished-eaves': 'rgb(222, 222, 222)',
      'unfinished-trim': 'rgb(245, 245, 245)',
      'red-stain': 'rgb(205, 116, 72)',
      'cedar-tone-stain': 'rgb(183, 120, 83)',
      'brown-stain': 'rgb(118, 91, 83)',
      'natural-stain': 'rgb(178, 120, 59)',
      'charwood-stain': 'rgb(75, 60, 48)',
      'cedar-plank': 'rgb(169, 107, 69)',
      'cedar-shake': 'rgb(169, 107, 69)',
      'roof-metal': 'rgb(105, 108, 108)',
      'aluminum': 'rgb(155, 158, 158)',
      'appliance': 'rgb(207, 212, 217)',
      'satin-nickel': 'rgb(181, 182, 181)',
      'black': 'rgb(0, 0, 0)',
      'matte-black': 'rgb(0, 0, 0)',
      'white': 'rgb(255, 255, 255)',
      'fixture': 'rgb(26, 126, 126)',
      'fixture1': 'rgb(26, 126, 126)',
      'white-shaker': 'rgb(245, 241, 238)',
      'grey-shaker': 'rgb(161, 161, 159)',
      'high-gloss-white-flat': 'rgb(242, 242, 239)'
    },
    shadowGroups: [
      'Lantern',
      'Planter',
      'TallPot',
      'ShortPot',
      'TallPlant',
      'ShortPlant',
      'PlanterPlant',
      'lounge_wood'
    ],
    materialGroups: [
      'roof',
      'shingles',
      'galvalume',
      'timber',
      'hardware',
      'pine-swing',
      'post-table',
      'wood-bar-top',
      'lattice-screen'
    ],
    finishGroups: [
      'white',
      'black',
      'fixture'
    ],
    textures: {
      'wood': 'https://bigtimber-dev.bypboh.com/assets/textures/wood.jpg',
      'concrete': 'https://bigtimber-dev.bypboh.com/assets/textures/concrete.jpg',
      'base-lap': 'https://bigtimber-dev.bypboh.com/assets/textures/base_lap.png',
      'shingle-driftwood': 'https://bigtimber-dev.bypboh.com/assets/textures/shingle-driftwood.jpg',
      'shingle-black': 'https://bigtimber-dev.bypboh.com/assets/textures/shingle-black.jpg',
      'shingle-dark-brown': 'https://bigtimber-dev.bypboh.com/assets/textures/shingle-dark-brown.jpg',
      'shingle-light-brown': 'https://bigtimber-dev.bypboh.com/assets/textures/shingle-light-brown.jpg',
      'shingle-white': 'https://bigtimber-dev.bypboh.com/assets/textures/shingle-white.jpg',
      'cedar-plank': 'https://bigtimber-dev.bypboh.com/assets/textures/cedar-plank.jpg',
      'cedar-shake': 'https://bigtimber-dev.bypboh.com/assets/textures/cedar-shake.jpg',
      'ashlar-oak': 'https://bigtimber-dev.bypboh.com/assets/textures/ashlar-oak.jpg',
      'sandcastle-oak': 'https://bigtimber-dev.bypboh.com/assets/textures/sandcastle-oak.jpg'
    },
    setColor: function (group, rgb) {
      if(!rgb) return
      rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',')
      color = new BABYLON.Color3.FromInts(rgb[0], rgb[1], rgb[2])
      for (var i = 0; i < Harp[group].getChildMeshes(false).length; i++){
        Harp[group].getChildMeshes(false)[i].material.diffuseColor = color
      }
    },
    setModel: function(model, suffix='ogee') {
      const parts = model.split('-');
      const size = parts.pop();
      const name = parts.join('-');
      const length = size.split('x')[0]
      const depth = size.split('x')[1]
      const parsed = { name, size, length, depth };

      if(parsed.name === 'laguna') {
        //set default endcut
        suffix = 'default'
      }
      window.recipe = {
        "model": parsed.name,
        "size": parsed.size,
        "endcut": suffix,
        "depth": parsed.depth,
        "length": parsed.length
      }

      Harp.useRecipe()
    },
    setUnitSize: function(size) {
      window.recipe.size = size
      window.recipe.length = size.split('x')[0]
      window.recipe.depth = size.split('x')[1]
      Harp.useRecipe()
    },
    setEndCut: function(suffix = 'default') {
      window.recipe.endcut = suffix
      Harp.useRecipe()
    },
    setStain: function(color) {
      Harp.setColor('timber', Harp.colors[color + '-stain'])
      Harp.setColor('roof', Harp.colors[color + '-stain'])
      //Harp.setColor('timber', Harp.colors['cedar-plank'])
    },
    setShingle: function(color) {
      let shinglesTexture = new BABYLON.Texture(Harp.textures['shingle-' + color])
      if (Harp.config.product === 'saratoga') {
        shinglesTexture.uScale = shinglesTexture.vScale = 0.8
      } else {
        shinglesTexture.wAng = Math.PI/2
        shinglesTexture.uScale = shinglesTexture.vScale = 0.02
      }
      Harp.shingles_material.diffuseTexture = shinglesTexture
    },
    setFeature: function(feature, on=true) {
      if (on) {
        Harp[feature].setEnabled(true)
      } else {
        Harp[feature].setEnabled(false)
      }
    },
    ucfirst: function(string) {
      return string[0].toUpperCase() + string.slice(1);
    },
    formatPrice: new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }),
    loadDefaultRecipe: function(model = null) {
      let recipeResponse = {}
      if(model == null) {
        model = document.querySelector('#renderCanvas').getAttribute('data-big-timber-model')
        const parts = model.split('-');
        const size = parts.pop();
        const name = parts.join('-');
        const length = size.split('x')[0]
        const depth = size.split('x')[1]
        const parsed = { name, size, length, depth };
        let suffix = 'ogee'
        if(parsed.name === 'laguna') {
          //set default endcut
          suffix = 'default'
        }
        window.recipe = {
          "model": parsed.name,
          "size": parsed.size,
          "endcut": suffix,
          "depth": parsed.depth,
          "length": parsed.length
        }
      }
      Harp.useRecipe()
    },
    setCamera: function (side) {
      if(Harp.config.depth <= 14) {
        Harp.camera.spinTo('radius', 450, 100)
      } else {
        Harp.camera.spinTo('radius', 700, 100)
      }
      if (side === 'exterior') {
        if (Harp.camera.beta < BABYLON.Tools.ToRadians(60)) {
          Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(90), 66)
        }
      }
      if (side === 'interior') {
        Harp.camera.spinTo('alpha', BABYLON.Tools.ToRadians(45), 66)
        Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(30), 66)
      }
      if (side === 'front') {
        Harp.camera.spinTo('alpha', Math.PI/2, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'back') {
        Harp.camera.spinTo('alpha', -Math.PI/2, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'left') {
        Harp.camera.spinTo('alpha', Math.PI, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'right') {
        Harp.camera.spinTo('alpha', 0, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
    },
    generatePanelMenu: function(side) {
      return
    },
    needsTrimCode: function(panel) {
      return
    },
    getDoor72Qty: function() {
      return
    },
    getDoor36Qty: function() {
      return
    },
    getWindowQty: function() {
      return
    },
    updateOptionsConfigArray: function() {
      return
    },
    updateInteriorConfigArray: function() {
      return
    },
    updateElevationConfig: function(side) {
      return
    },
    updatePanelThumbs: function() {
      return
    },
    updateConfigParam: function(item, sku, label = null, price = null) {
      Harp.config[item] = sku

      if(label !== null) {
        Harp.config[item + '_label'] = label
      }

      if(price !== null) {
        Harp.config[item + '_price'] = price
      }
      if(Harp.bomCodes.hasOwnProperty(sku)) {
        Harp.config[item + '_code'] = Harp.bomCodes[sku]
      }
    },
    calculatePanelCost: function(panel) {
      return
    },
    updateConfig: function() {
      return
    },
    init: function () {
      Harp.materialGroups.forEach(function (group){
        Harp[group].setEnabled(false)
      })
      Harp['roof'].setEnabled(true);
      Harp['shingles'].setEnabled(true);
      Harp['timber'].setEnabled(true);
      Harp['hardware'].setEnabled(true);
      Harp['white'].setEnabled(true);
      Harp['black'].setEnabled(true);
      Harp['galvalume'].setEnabled(true);


      let woodTexture = new BABYLON.Texture(Harp.textures['wood'])
      woodTexture.uScale = woodTexture.vScale = 0.015
      woodTexture.specular = 5
      woodTexture.emissive = new BABYLON.Color3(0.05, 0.05, 0.05)
      woodTexture.diffuse = new BABYLON.Color3(0.05, 0.05, 0.05)
      woodTexture.ambient = new BABYLON.Color3(0.05, 0.05, 0.05)
      woodTexture.useParallax = true
      woodTexture.useParallaxOcclusion = true
      woodTexture.anisotropicFilteringLevel = 1


      let specColor = new BABYLON.Color3(0.25, 0.25, 0.25)

      Harp.setColor('hardware', Harp.colors['black'])
      Harp.hardware_material.diffuseColor = new BABYLON.Color3(0.05, 0.05, 0.05)
      Harp.hardware_material.specularPower = 25
      Harp.hardware_material.specularColor = new BABYLON.Color3(0.8, 0.8, 0.8);


      Harp.setColor('timber', Harp.colors['red-stain'])
      Harp.timber_material.diffuseTexture = woodTexture
      //Harp.timber_material.diffuseColor = new BABYLON.Color3(0.05, 0.05, 0.05)
      Harp.timber_material.specularPower = 5
      Harp.timber_material.specularColor = specColor

      Harp.setColor('shingles', Harp.colors['white'])

      Harp.shingles_material.specularPower = 7
      Harp.shingles_material.specularColor  = specColor


      Harp.setColor('roof', Harp.colors['cedar-plank'])
      Harp.roof_material.diffuseTexture = woodTexture
      Harp.roof_material.specularPower = 10
      Harp.roof_material.specularColor = specColor


      Harp.setColor('galvalume', Harp.colors['roof-metal'])
      Harp.galvalume_material.specularPower = 20
      Harp.galvalume_material.specularColor = new BABYLON.Color3(0.33, 0.33, 0.33)


    }
  }

  const scene = createScene()

  scene.executeWhenReady(function () {
    Harp.init()
    setTimeout(function(){
      document.querySelector('#renderCanvas').removeAttribute('style')
      document.querySelector('#loader').classList.add('fade-out');
      engine.resize()
      document.dispatchEvent(loadEvent);
      window.dispatchEvent(new CustomEvent('update-exterior'))
    }, 1500);
  })
  scene.clearColor = BABYLON.Color3.White();
  engine.runRenderLoop(function () {
    scene.render()
  })

  document.querySelector('#renderCanvas').addEventListener('wheel', evt => evt.preventDefault())

  window.addEventListener("resize", function () {
    engine.resize()
  })
  window.Harp = Harp
})