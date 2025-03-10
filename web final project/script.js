function locomotive() {
  gsap.registerPlugin(ScrollTrigger);

  const locoScroll = new LocomotiveScroll({
    el: document.querySelector("#main"),
    smooth: true,
  });
  locoScroll.on("scroll", ScrollTrigger.update);

  ScrollTrigger.scrollerProxy("#main", {
    scrollTop(value) {
      return arguments.length
        ? locoScroll.scrollTo(value, 0, 0)
        : locoScroll.scroll.instance.scroll.y;
    },

    getBoundingClientRect() {
      return {
        top: 0,
        left: 0,
        width: window.innerWidth,
        height: window.innerHeight,
      };
    },

    pinType: document.querySelector("#main").style.transform
      ? "transform"
      : "fixed",
  });
  ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
  ScrollTrigger.refresh();
}
locomotive();


const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  render();
});

function files(index) {
  var data = `
       ./male/male0001.png
       ./male/male0002.png
       ./male/male0003.png
       ./male/male0004.png
       ./male/male0005.png
       ./male/male0006.png
       ./male/male0007.png
       ./male/male0008.png
       ./male/male0009.png
       ./male/male0010.png
       ./male/male0011.png
       ./male/male0012.png
       ./male/male0013.png
       ./male/male0014.png
       ./male/male0015.png
       ./male/male0016.png
       ./male/male0017.png
       ./male/male0018.png
       ./male/male0019.png
       ./male/male0020.png
       ./male/male0021.png
       ./male/male0022.png
       ./male/male0023.png
       ./male/male0024.png
       ./male/male0025.png
       ./male/male0026.png
       ./male/male0027.png
       ./male/male0028.png
       ./male/male0029.png
       ./male/male0030.png
       ./male/male0031.png
       ./male/male0032.png
       ./male/male0033.png
       ./male/male0034.png
       ./male/male0035.png
       ./male/male0036.png
       ./male/male0037.png
       ./male/male0038.png
       ./male/male0039.png
       ./male/male0040.png
       ./male/male0041.png
       ./male/male0042.png
       ./male/male0043.png
       ./male/male0044.png
       ./male/male0045.png
       ./male/male0046.png
       ./male/male0047.png
       ./male/male0048.png
       ./male/male0049.png
       ./male/male0050.png
       ./male/male0051.png
       ./male/male0052.png
       ./male/male0053.png
       ./male/male0054.png
       ./male/male0055.png
       ./male/male0056.png
       ./male/male0057.png
       ./male/male0058.png
       ./male/male0059.png
       ./male/male0060.png
       ./male/male0061.png
       ./male/male0062.png
       ./male/male0063.png
./male/male0064.png
./male/male0065.png
./male/male0066.png
./male/male0067.png
./male/male0068.png
./male/male0069.png
./male/male0070.png
./male/male0071.png
./male/male0072.png
./male/male0073.png
./male/male0074.png
./male/male0075.png
./male/male0076.png
./male/male0077.png
./male/male0078.png
./male/male0079.png
./male/male0080.png
./male/male0081.png
./male/male0082.png
./male/male0083.png
./male/male0084.png
./male/male0085.png
./male/male0086.png
./male/male0087.png
./male/male0088.png
./male/male0089.png
./male/male0090.png
./male/male0091.png
./male/male0092.png
./male/male0093.png
./male/male0094.png
./male/male0095.png
./male/male0096.png
./male/male0097.png
./male/male0098.png
./male/male0099.png
./male/male0100.png
./male/male0101.png
./male/male0102.png
./male/male0103.png
./male/male0104.png
./male/male0105.png
./male/male0106.png
./male/male0107.png
./male/male0108.png
./male/male0109.png
./male/male0110.png
./male/male0111.png
./male/male0112.png
./male/male0113.png
./male/male0114.png
./male/male0115.png
./male/male0116.png
./male/male0117.png
./male/male0118.png
./male/male0119.png
./male/male0120.png
./male/male0121.png
./male/male0122.png
./male/male0123.png
./male/male0124.png
./male/male0125.png
./male/male0126.png
./male/male0127.png
./male/male0128.png
./male/male0129.png
./male/male0130.png
./male/male0131.png
./male/male0132.png
./male/male0133.png
./male/male0134.png
./male/male0135.png
./male/male0136.png
./male/male0137.png
./male/male0138.png
./male/male0139.png
./male/male0140.png
./male/male0141.png
./male/male0142.png
./male/male0143.png
./male/male0144.png
./male/male0145.png
./male/male0146.png
./male/male0147.png
./male/male0148.png
./male/male0149.png
./male/male0150.png
./male/male0151.png
./male/male0152.png
./male/male0153.png
./male/male0154.png
./male/male0155.png
./male/male0156.png
./male/male0157.png
./male/male0158.png
./male/male0159.png
./male/male0160.png
./male/male0161.png
./male/male0162.png
./male/male0163.png
./male/male0164.png
./male/male0165.png
./male/male0166.png
./male/male0167.png
./male/male0168.png
./male/male0169.png
./male/male0170.png
./male/male0171.png
./male/male0172.png
./male/male0173.png
./male/male0174.png
./male/male0175.png
./male/male0176.png
./male/male0177.png
./male/male0178.png
./male/male0179.png
./male/male0180.png
./male/male0181.png
./male/male0182.png
./male/male0183.png
./male/male0184.png
./male/male0185.png
./male/male0186.png
./male/male0187.png
./male/male0188.png
./male/male0189.png
./male/male0190.png
./male/male0191.png
./male/male0192.png
./male/male0193.png
./male/male0194.png
./male/male0195.png
./male/male0196.png
./male/male0197.png
./male/male0198.png
./male/male0199.png
./male/male0200.png
./male/male0201.png
./male/male0202.png
./male/male0203.png
./male/male0204.png
./male/male0205.png
./male/male0206.png
./male/male0207.png
./male/male0208.png
./male/male0209.png
./male/male0210.png
./male/male0211.png
./male/male0212.png
./male/male0213.png
./male/male0214.png
./male/male0215.png
./male/male0216.png
./male/male0217.png
./male/male0218.png
./male/male0219.png
./male/male0220.png
./male/male0221.png
./male/male0222.png
./male/male0223.png
./male/male0224.png
./male/male0225.png
./male/male0226.png
./male/male0227.png
./male/male0228.png
./male/male0229.png
./male/male0230.png
./male/male0231.png
./male/male0232.png
./male/male0233.png
./male/male0234.png
./male/male0235.png
./male/male0236.png
./male/male0237.png
./male/male0238.png
./male/male0239.png
./male/male0240.png
./male/male0241.png
./male/male0242.png
./male/male0243.png
./male/male0244.png
./male/male0245.png
./male/male0246.png
./male/male0247.png
./male/male0248.png
./male/male0249.png
./male/male0250.png
./male/male0251.png
./male/male0252.png
./male/male0253.png
./male/male0254.png
./male/male0255.png
./male/male0256.png
./male/male0257.png
./male/male0258.png
./male/male0259.png
./male/male0260.png
./male/male0261.png
./male/male0262.png
./male/male0263.png
./male/male0264.png
./male/male0265.png
./male/male0266.png
./male/male0267.png
./male/male0268.png
./male/male0269.png
./male/male0270.png
./male/male0271.png
./male/male0272.png
./male/male0273.png
./male/male0274.png
./male/male0275.png
./male/male0276.png
./male/male0277.png
./male/male0278.png
./male/male0279.png
./male/male0280.png
./male/male0281.png
./male/male0282.png
./male/male0283.png
./male/male0284.png
./male/male0285.png
./male/male0286.png
./male/male0287.png
./male/male0288.png
./male/male0289.png
./male/male0290.png
./male/male0291.png
./male/male0292.png
./male/male0293.png
./male/male0294.png
./male/male0295.png
./male/male0296.png
./male/male0297.png
./male/male0298.png
./male/male0299.png
./male/male0300.png

   `;
  return data.split("\n")[index];
}

const frameCount = 300;

const images = [];
const imageSeq = {
  frame: 1,
};

for (let i = 0; i < frameCount; i++) {
  const img = new Image();
  img.src = files(i);
  images.push(img);
}

gsap.to(imageSeq, {
  frame: frameCount - 1,
  snap: "frame",
  ease: `none`,
  scrollTrigger: {
    scrub: 0.15,
    trigger: `#page>canvas`,
    start: `top top`,
    end: `600% top`,
    scroller: `#main`,
  },
  onUpdate: render,
});

images[1].onload = render;

function render() {
  scaleImage(images[imageSeq.frame], context);
}

function scaleImage(img, ctx) {
  var canvas = ctx.canvas;
  var hRatio = canvas.width / img.width;
  var vRatio = canvas.height / img.height;
  var ratio = Math.max(hRatio, vRatio);
  var centerShift_x = (canvas.width - img.width * ratio) / 2;
  var centerShift_y = (canvas.height - img.height * ratio) / 2;
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(
    img,
    0,
    0,
    img.width,
    img.height,
    centerShift_x,
    centerShift_y,
    img.width * ratio,
    img.height * ratio
  );
}
ScrollTrigger.create({
  trigger: "#page>canvas",
  pin: true,
  // markers:true,
  scroller: `#main`,
  start: `top top`,
  end: `600% top`,
});



gsap.to("#page1", {
  scrollTrigger: {
    trigger: `#page1`,
    start: `top top`,
    end: `bottom top`,
    pin: true,
    scroller: `#main`
  }
})
gsap.to("#page2", {
  scrollTrigger: {
    trigger: `#page2`,
    start: `top top`,
    end: `bottom top`,
    pin: true,
    scroller: `#main`
  }
})
gsap.to("#page3", {
  scrollTrigger: {
    trigger: `#page3`,
    start: `top top`,
    end: `bottom top`,
    pin: true,
    scroller: `#main`
  }
})